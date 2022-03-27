<?php

namespace App\Controller;

use App\Entity\Employe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiquesController extends AbstractController
{
     /**
     * @Route("/statistiques", name="app_statistiques")
     */
    public function affStatistiques()
    {
        $employes = $this->getDoctrine()->getRepository(Employe::class)->findBy(['statut' => 1]);

        $employesNoms = [];
        $employeNbServices = [];

        foreach($employes as $employe)
        {
            $employesNoms[] = $employe->getNom()." ".$employe->getPrenom();
            $employeNbServices[] = count($employe->getServices());
        }
        return $this->render('statistiques/stats.html.twig', [
            'employeNoms' => json_encode($employesNoms),
            'employeNbServices' => json_encode(($employeNbServices))
        ]);
    }
}
