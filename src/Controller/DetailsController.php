<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Technology;
use App\Repository\ImageRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/{id}/details", name="details")
     * @param int $id
     * @param ProjectRepository $projectRepository
     * @param ImageRepository $imageRepository
     * @param TechnologyRepository $technologyRepository
     * @return Response
     */
    public function index(
        int $id,
        ProjectRepository $projectRepository,
        ImageRepository $imageRepository,
        TechnologyRepository $technologyRepository
    ): Response
    {
        $project = $projectRepository->findOneBy(['id' => $id]);
        $images = $imageRepository->findBy(['idProject' => $id]);
        $technologies = $technologyRepository->findByProject($project);
        return $this->render('details/index.html.twig', [
            'project' => $project,
            'images' => $images,
            'technologies' => $technologies
        ]);
    }
}
