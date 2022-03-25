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

            //grain de sel + hachage
            $mp = 'K3po' . md5($mp);
            $employe->setMp($mp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            return $this->redirectToRoute('app_employeAjoutHash');
        }
        return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
    }

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
        $employe = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        $lstFormations = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        $inscription = $this
            ->getDoctrine()
            ->getRepository(Inscription::class)
            ->findInscriptionEA($idEmploye);
        // $formationDispo = $this->getDoctrine()->getRepository()
        $ensServices = $employe->getServices();
        if (!$ensServices) {
            $message = "Pas de formation";
        } else {
            $message = null;
        }
        return $this->render('employe/listeFormations.html.twig', array('ensServices' => $ensServices, 'ensInscriptions' => $inscription, 'ensFormations' => $lstFormations, 'message' => $message));
    }

    /**
     * @Route("/inscriptionEmployeFormation/{id}", name="app_inscriptionEmployeFormation")
     */
    public function inscriptionEmployeFormation($id)
    {
        //dd($id);
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
            echo 'non inscrit';
        }
        return $this->redirectToRoute('app_formationAff');
    }

    /**
     * @Route("/desinscriptionEmployeFormation/{id}", name="app_desinscriptionEmployeFormation")
     */
    public function désinscriptionEmployeFormation($id)
    {
        //permet de désinscrire un employé à une formation
        $inscription = $this->getDoctrine()->getRepository(Inscription::class)->find($id);
        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->remove($inscription);
        $manager->flush();
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
     * @Route("/voirEmployeServices/{id}", name="app_voirEmployeServices")
     */
    public function voirEmployeServices($id)
    {
        //Permet de voir les formations d'un employé
        $idEmploye = $this->get('session')->get('employeId');
        $userAdmin = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($id);
        if ($userAdmin->getStatut() == 1) {
            return $this->redirectToRoute('app_formationAff');
        }
        $services = $this->getDoctrine()->getRepository(Services::class)->findAll();
        if (!$services) {
            $message = "Pas d'inscriptions'";
        } else {
            $message = null;
        }
        $servicesEmploye = $user->getServices();
        return $this->render('employe/voirEmployesServices.html.twig', array('employe' => $user, 'ensServices' => $services, 'message' => $message, 'ensServicesByEmploye' => $servicesEmploye));
    }
}
