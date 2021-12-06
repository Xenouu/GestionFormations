<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Formation;
use App\Form\FormationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation", name="formation")
     */
    public function index(): Response
    {
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }

    /**
     * @Route("/formationAjout/", name="app_formationAjout")
     */
    public function AjoutFormation(Request $request, $formation = null)
    {
        if ($formation == null) {
            $formation = new formation();
        }
        $form = $this->createForm(formationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            return $this->redirectToRoute('app_gererFormation');
        }

        return $this->render('formation/editer.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/gererFormation", name="app_gererFormation")
     */
    public function GererFormation()
    {
        $idEmploye = $this->get('session')->get('employeId');
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        if ($user->getStatut() == 1)
        {
            return $this->redirectToRoute('app_formationAff');
        }
        $formation = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        if (!$formation) {
            $message = "Pas de formation";
        } else {
            $message = null;
        }
        return $this->render('formation/gererFormation.html.twig', array('ensFormations' => $formation, 'message' => $message));
    }
    /**
     * @Route("/supprimerFormation/{id}", name="app_supp_formation")
     */
    public function SupprimerFormation($id)
    {
        $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->remove($formation);
        $manager->flush();
        return $this->redirectToRoute('app_gererFormation');
    }
}
