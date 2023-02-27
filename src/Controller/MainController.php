<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{


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
