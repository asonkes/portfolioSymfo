<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ProjectsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('admin/projets/', name: 'admin_projects_')]
class ProjectController extends AbstractController
{

    #[Route('index', name: 'index')]
    public function index(EntityManagerInterface $em): Response
    {
        $project = $em->getRepository(Project::class)->findBy([], ['created_at' => 'DESC']);

        return $this->render('admin/project/index.html.twig', [
            'project' => $project
        ]);
    }

    #[Route('ajout', name: 'add')]
    public function add(Project $project): Response
    {
        $project = new Project();

        // On créé le formulaire pour ajouter le produit
        $projectForm = $this->createForm(ProjectsFormType::class, $project);

        return $this->render('admin/project/add.html.twig', [
            'projectForm' => $projectForm->createView()
        ]);
    }

    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(): Response
    {
        return $this->render('admin/project/edit.html.twig');
    }

    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(): Response
    {
        return $this->render('admin/project/delete.html.twig');
    }
}
