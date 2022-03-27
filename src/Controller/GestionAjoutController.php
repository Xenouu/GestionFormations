<?php

namespace App\Controller;


use App\Entity\Employe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionAjoutController extends AbstractController
{
    /**
     * @Route("/indexAJout/", name="app_gererAjouts")
     */
    public function indexAJout()
    {
        $idEmploye = $this->get('session')->get('employeId');
        $user = $this->getDoctrine()->getRepository(Employe::class)->find($idEmploye);
        if ($user->getStatut() == 1) {
            return $this->redirectToRoute('app_formationAff');
        }

        return $this->render('gestion_ajout/index.html.twig');
    }
}
