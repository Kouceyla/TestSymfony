<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeeloWordController extends AbstractController
{
    #[Route('/heelo/word', name: 'app_heelo_word')]
    public function index(): Response
    {
        return $this->render('heelo_word/index.html.twig', [
            'controller_name' => 'HeeloWordController',
        ]);
    }
}
