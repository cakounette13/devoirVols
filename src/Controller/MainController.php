<?php

namespace App\Controller;

use App\Repository\FlightsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(FlightsRepository $flightsRepository): Response
    {
        $flights = $flightsRepository->findAll();
        return $this->render('main/index.html.twig', [
            'flights' => $flights,
        ]);
    }
}