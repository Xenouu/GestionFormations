<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeServicesController extends AbstractController
{
    /**
     * @Route("/employe/services", name="employe_services")
     */
    public function index(): Response
    {
        return $this->render('employe_services/index.html.twig', [
            'controller_name' => 'EmployeServicesController',
        ]);
    }
}
