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

    #[Route('/cgu', name: 'main_cgu')]
    public function cgu(): Response
    {
        return $this->render('main/cgu.html.twig');
    }

    #[Route('/about_us', name: 'main_about_us')]
    public function aboutUs(): Response
    {
        return $this->render('main/about-us.html.twig');
    }

    #[Route('/legal_notice', name: 'main_legal_notice')]
    public function legalNotice(): Response
    {
        return $this->render('main/legal-notice.html.twig');
    }
}
