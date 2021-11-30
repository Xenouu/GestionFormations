<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

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
}
