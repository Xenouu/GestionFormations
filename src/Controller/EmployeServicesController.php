<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeServicesController extends AbstractController
{
    /**
     * @Route("/serviceAddEmploye/{idEmploye}/{idService}", name="app_serviceAddEmploye")
     */
    public function AjoutServiceForEmploye($idEmploye, $idService)
    {
        $employe = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        $service = $this->getDoctrine()->getRepository(Services::class)->find($idService);

        $employe->addService($service);

        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->persist($employe);
        $manager->flush();
        return $this->redirectToRoute('app_voirEmployeServices', ['id' => $idEmploye]);
    }

    /**
     * @Route("/retirerAddEmploye/{idEmploye}/{idService}", name="app_serviceRemoveEmploye")
     */
    public function RetirerServiceForEmploye($idEmploye, $idService)
    {
        $employe = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        $service = $this->getDoctrine()->getRepository(Services::class)->find($idService);

        $employe->removeService($service);

        $manager = $this
            ->getDoctrine()
            ->getManager();

        $manager->persist($employe);
        $manager->flush();
        return $this->redirectToRoute('app_voirEmployeServices', ['id' => $idEmploye]);
    }
}
