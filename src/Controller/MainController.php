<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]
    public function home(AccomodationRepository $accomodationRepository): Response
    {
        $accomodations = $accomodationRepository->findBy([], ['releaseDate' => 'DESC']);
        return $this->render('main/home.html.twig', [
            'accomodations' => $accomodations
        ]);
    }
}
