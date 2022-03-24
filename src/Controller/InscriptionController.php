<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscriptionAjout/", name="app_inscriptionAjout")
     */
    public function AjoutInscription(Request $request, $inscription = null)
    {
        if ($inscription == null) {
            $inscription = new inscription();
        }
        $form = $this->createForm(inscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inscription);
            $em->flush();
            return $this->redirectToRoute('app_inscriptionAjout');
        }

        return $this->render('inscription/editer.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/gestionInscription", name="app_gestion_inscription")
     */
    public function GestionInscription()
    {
        $idEmploye = $this->get('session')->get('employeId');
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        if ($user->getStatut() == 1) {
            return $this->redirectToRoute('app_formationAff');
        }
        $inscriptions = $this
            ->getDoctrine()
            ->getRepository(Inscription::class)
            ->findFormationE();
        $message = "";
        if (!($inscriptions)) {
            $message = "Il n'y a pas de formation en cours";
        }
        return $this->render('inscription/listeInscriptions.html.twig', array('ensInscriptions' => $inscriptions, 'message' => $message));
    }
    /**
     * @Route("/supprimerInscription/{id}", name="app_supp_inscription")
     */
    public function SupprimerFormation($id)
    {
        $inscription = $this->getDoctrine()->getRepository(Inscription::class)->find($id);
        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->remove($inscription);
        $manager->flush();
        return $this->redirectToRoute('app_gestion_inscription');
    }
    /**
     * @Route("/accepteInscription/{id}", name="app_accepte_Inscription")
     */
    public function AccepteInscription($id)
    {
        $inscription = $this->getDoctrine()->getRepository(Inscription::class)->find($id);
        $inscription->setStatut('A');
        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->persist($inscription);
        $manager->flush();
        return $this->redirectToRoute('app_gestion_inscription');
    }
    /**
     * @Route("/refuseInscription/{id}", name="app_refuse_Inscription")
     */
    public function RefuseInscription($id)
    {
        $inscription = $this->getDoctrine()->getRepository(Inscription::class)->find($id);
        $inscription->setStatut('R');
        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->persist($inscription);
        $manager->flush();
        return $this->redirectToRoute('app_gestion_inscription');
    }
}
