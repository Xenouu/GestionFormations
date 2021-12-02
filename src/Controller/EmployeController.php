<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Formation;
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

    /**
     * @Route("/employeAjout/", name="app_employeAjout")
     */
    public function AjoutEmploye(Request $request, $employe = null)
    {
        if ($employe == null) {
            $employe = new Employe();
        }
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            return $this->redirectToRoute('app_employeAjout');
        }

        return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/employeAjoutHash/", name="app_employeAjoutHash")
     */
    public function registration(UserPasswordHasherInterface $passwordHasher, Request $request, $employe = null)
    {
        // ... e.g. get the user data from a registration form
        if ($employe == null) {
            $employe = new Employe();
        }
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // hash the password (based on the security.yaml config for the $user class)
            $mp = $form->get('mp')->getViewData();
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

    /**
     * @Route("/employeAuth/", name="app_employeAuth")
     */
    public function authEmploye(Request $request, $employe = null)
    {
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
                return $this->redirectToRoute('app_employeAff');
            }
        }
        return $this->render('employe/editer.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/formationAff/", name="app_formationAff")
     */
    public function formationAff()
    {
        $formation = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        if (!$formation) {
            $message = "Pas de formation";
        } else {
            $message = null;
        }
        return $this->render('employe/listeFormations.html.twig', array('ensFormations' => $formation, 'message' => $message));
    }



    /**
     * @Route("/inscriptionEmployeFormation/{id}", name="app_inscriptionEmployeFormation")
     */
    public function inscriptionEmployeFormation($id)
    {
        $idEmploye = $this->get('session')->get('employeId');
        $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
        $employe = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);

        $inscription = new Inscription();
        $inscription->setStatut('E');
        $inscription->setEmploye($employe);
        $inscription->setFormation($formation);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($inscription);
        $manager->flush();


        return $this->redirectToRoute('app_formationAff');
    }
}
