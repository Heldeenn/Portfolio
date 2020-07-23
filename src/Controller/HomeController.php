<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function index(Request $request, ProjectRepository $projectRepository, ImageRepository $imageRepository): Response
    {
        $projects = $projectRepository->findBy([], ['dateEnd' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
