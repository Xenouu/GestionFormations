<?php

namespace App\Controller;

use App\Entity\Services;
use App\Form\ServicesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);
    }

    /**
     * @Route("/servicesAjout/", name="app_servicesAjout")
     */
    public function AjoutServices(Request $request, $services = null)
    {
        if ($services == null) {
            $services = new Services();
        }

        $form = $this->createForm(servicesType::class, $services);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($services);
            $em->flush();
            return $this->redirectToRoute('app_servicesAjout');
        }

        return $this->render('services/editer.html.twig', array('form' => $form->createView()));
    }
}
