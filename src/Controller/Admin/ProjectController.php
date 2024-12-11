<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('admin/projets/', name: 'admin_projects_')]
class ProjectController extends AbstractController
{

    #[Route('index', name: 'index')]
    public function index(Project $project, EntityManagerInterface $entityManager): Response
    {
        $project = new Project();

        $project = $entityManager->getRepository(Project::class)->findAll();

        return $this->render('admin/project/project.html.twig', [
            'project' => $project
        ]);
    }
}
