<?php

namespace App\Controller;

use App\Entity\Animateur;
use App\Repository\StageRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StageController extends AbstractController
{
    public function voirTous(StageRepository $stageRepository): Response
    {

        return $this->render('stage/voirTous.html.twig', [
            'stages' => $stageRepository -> findAll(),
        ]);
    }

    public function voirStagesAnimateur(Animateur $animateur): Response
    {

        return $this->render('stage/voirStagesAnimateur.html.twig', [
            'animateur' => $animateur,
        ]);
    }
}
