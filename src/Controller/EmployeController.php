<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Formation;
use App\Entity\Services;
use App\Entity\Inscription;
use App\Form\EmployeType;
use App\Form\AuthType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Session\Session;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class EmployeController extends AbstractController
{
    /**
     * @Route("/employe", name="employe")
     */
    public function index(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    // /**
    //  * @Route("/employeAjout/", name="app_employeAjout")
    //  */
    // public function AjoutEmploye(Request $request, $employe = null)
    // {
    //permet d'ajouter un employé non chiffré
    //     if ($employe == null) {
    //         $employe = new Employe();
    //     }
    //     $form = $this->createForm(EmployeType::class, $employe);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($employe);
    //         $em->flush();
    //         return $this->redirectToRoute('app_employeAjout');
    //     }

    //     return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
    // }

    /**
     * @Route("/employeAjoutHash/", name="app_employeAjoutHash")
     */
    public function registration(UserPasswordHasherInterface $passwordHasher, Request $request, $employe = null)
    {
        //Permet d'ajouter un employé avec un mot de passe hashé
        //Si il n'existe, le créer
        if ($employe == null) {
            $employe = new Employe();
        }

        //Form actions
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // hash the password (based on the security.yaml config for the $user class)
            $mp = $form->get('mp')->getViewData();

            //grain de sel + hashage
            $mp = 'K3po' . md5($mp);
            $employe->setMp($mp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            return $this->redirectToRoute('app_employeAjoutHash');
        }
        return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
        // ...
    }

    // public function delete(UserPasswordHasherInterface $passwordHasher, UserInterface $user)
    // {
    //     // ... e.g. get the password from a "confirm deletion" dialog
    //     $plaintextPassword = ...;

    //     if (!$passwordHasher->isPasswordValid($user, $plaintextPassword)) {
    //         throw new AccessDeniedHttpException();
    //     }
    // }
    //

    /**
     * @Route("/", name="app_employeAuth")
     */
    public function authEmploye(Request $request, $employe = null)
    {
        //permet d'identifier un utilisateur avec un mot de passe hashé
        $form = $this->createForm(AuthType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $login = $form->get('login')->getViewData();
            $mp = $form->get('mp')->getViewData();
            $mp = 'K3po' . md5($mp);
            $user = $this->getDoctrine()->getRepository(Employe::class)->findBy(
                [
                    'login' => $login,
                    'mp' => $mp
                ],
                [],
                1
            );
            if ($user == null) {
                return $this->redirectToRoute('app_employeAuth');
            } else {

                $session = new Session();
                $session->set('employeId', $user[0]->getId());
                $session->set('employeStatut', $user[0]->getStatut());
                return $this->redirectToRoute('app_formationAff', array('statutEmploye' => $user[0]->getStatut()));
            }
        }
        return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/formationAff/", name="app_formationAff")
     */
    public function formationAff()
    {
        //affiche toutes les formations et toutes les formations auquel l'utilisateur s'est inscrit
        $idEmploye = $this->get('session')->get('employeId');
        $formationDispo = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        // $inscription = $this->getDoctrine()->getRepository(Inscription::class)->findBy(['employe_id' => $idEmploye, 'statut' => 'A'], [], 4);
        $inscription = $this
            ->getDoctrine()
            ->getRepository(Inscription::class)
            ->findInscriptionEA($idEmploye);

        if (!$formationDispo) {
            $message = "Pas de formation";
        } else {
            $message = null;
        }
        return $this->render('employe/listeFormations.html.twig', array('ensFormations' => $formationDispo, 'ensInscription' => $inscription, 'message' => $message));
    }



    /**
     * @Route("/inscriptionEmployeFormation/{id}", name="app_inscriptionEmployeFormation")
     */
    public function inscriptionEmployeFormation($id)
    {
        //permet d'inscrire un employé à une formation
        $idEmploye = $this->get('session')->get('employeId');
        $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
        $employe = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        $exist = $this->getDoctrine()->getRepository(Inscription::class)->findBy(
            [
                'employe' => $employe,
                'formation' => $formation
            ],
            [],
            1
        );
        if ($exist == null) {
            $inscription = new Inscription();
            $inscription->setStatut('E');
            $inscription->setEmploye($employe);
            $inscription->setFormation($formation);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($inscription);
            $manager->flush();
        } else {
            echo 'non inscris';
        }
        return $this->redirectToRoute('app_formationAff');
    }




    /**
     * @Route("/employeDeco/", name="app_employeDeco")
     */
    public function employeDeco()
    {
        //Permet de se déconnecter
        $this->get('session')->remove('employeId');
        $this->get('session')->remove('employeStatut');

        return $this->redirectToRoute('app_employeAuth');
    }

    /**
     * @Route("/gererEmployes", name="app_gererEmployes")
     */
    public function gererEmployes()
    {
        //Permet de voir tout les employés dans l'onglet gerer employés
        $idEmploye = $this->get('session')->get('employeId');
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        if ($user->getStatut() == 1) {
            return $this->redirectToRoute('app_formationAff');
        }
        $employes = $this->getDoctrine()->getRepository(Employe::class)->findAll();
        if (!$employes) {
            $message = "Pas de formation";
        } else {
            $message = null;
        }
        return $this->render('employe/gererEmployes.html.twig', array('ensEmployes' => $employes, 'message' => $message));
    }

    /**
     * @Route("/voirEmployeInscription/{id}", name="app_voirEmployeInscription")
     */
    public function voirEmployeInscription($id)
    {
        //Permet de voir les formations d'un employé
        $idEmploye = $this->get('session')->get('employeId');
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        if ($user->getStatut() == 1) {
            return $this->redirectToRoute('app_formationAff');
        }
        $inscription = $this
            ->getDoctrine()
            ->getRepository(Inscription::class)
            ->findInscriptionEA($id);
        if (!$inscription) {
            $message = "Pas d'inscriptions'";
        } else {
            $message = null;
        }
        $services = $this->getDoctrine()->getRepository(Services::class)->findAll();
        // $servicesEmploye = $user.Services
        return $this->render('employe/voirEmployesInscription.html.twig', array('ensInscriptions' => $inscription, 'message' => $message, 'ensServicesName' => $services));
    }
}
