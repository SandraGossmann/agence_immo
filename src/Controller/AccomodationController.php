<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/accomodation', name: 'accomodation_')]
class AccomodationController extends AbstractController
{
    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(AccomodationRepository $accomodationRepository, int $id): Response
    {
        $accomodation = $accomodationRepository->find($id);
        return $this->render('accomodation/show.html.twig', [
            'accomodation' => $accomodation,
        ]);
    }

}
