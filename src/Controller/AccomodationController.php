<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accomodation;
use App\Entity\Search;
use App\Form\SearchType;


#[Route('/accomodation', name: 'accomodation_')]
class AccomodationController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function list(AccomodationRepository $accomodationRepository, Request $request): Response
    {
        $search = new Search();
        $searchForm = $this->createForm(SearchType::class, $search);
        $searchForm->handleRequest($request);

        if (!$searchForm->isSubmitted()){
            $accomodations = $accomodationRepository->findBy([], ['releaseDate' => 'DESC']);

        }

        return $this->render('accomodation/list.html.twig', [
            'searchForm' => $searchForm->createView(),
            'accomodations' => $accomodations,
        ]);


    }
    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(AccomodationRepository $accomodationRepository, int $id): Response
    {
        $accomodation = $accomodationRepository->find($id);
        return $this->render('accomodation/show.html.twig', [
            'accomodation' => $accomodation,
        ]);
    }

}
