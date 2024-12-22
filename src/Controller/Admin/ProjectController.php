<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ProjectsFormType;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('admin/projets/', name: 'admin_projects_')]
class ProjectController extends AbstractController
{
    #[Route('index', name: 'index')]
    public function index(EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $project = $em->getRepository(Project::class)->findBy([], ['created_at' => 'DESC']);

        return $this->render('admin/project/index.html.twig', [
            'project' => $project
        ]);
    }

    #[Route('ajout', name: 'add')]
    public function add(Project $project, Request $request, EntityManagerInterface $em, PictureService $pictureService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $project = new Project();

        // On créé le formulaire pour ajouter le projet
        $projectForm = $this->createForm(ProjectsFormType::class, $project);

        // On gère l'envoi du formulaire (on traite la requête du formulaire)
        $projectForm->handleRequest($request);

        // On gère le stockage en base de données (entityManagerInterface)
        if ($projectForm->isSubmitted() && $projectForm->isValid()) {

            // On récupère l'image du formulaire
            $image = $projectForm->get('image')->getData();

            // On définit le dossier de destination où l'image sera stockée (projets)
            $folder = 'projets';

            // On appelle le service d'ajout pour sauvegarder l'image
            $fichier = $pictureService->add($image, $folder);

            // Sauvegarder le fichier (ajouter ce nom de fichier à l'objet project)
            $project->setImage($fichier);  // Assurez-vous que l'entité Project a un champ pour l'image

            // Sauvegarder l'entité en base de données
            $em->persist($project);
            $em->flush();

            // Ajouter un message flash avant la redirection
            $this->addFlash('success', 'Votre projet a bien été ajouté à la base de données');

            // Redirection après ajout
            return $this->redirectToRoute('admin_projects_index');
        }

        return $this->render('admin/project/add.html.twig', [
            'projectForm' => $projectForm->createView()
        ]);
    }

    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Project $project, Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // On créé le formulaire pour ajouter le projet
        $projectForm = $this->createForm(ProjectsFormType::class, $project);

        // On gère l'envoi du formulaire (on traite la requete du formulaire)
        $projectForm->handleRequest($request);

        // On gère le stockage en base de données (entityManagerInterface)
        if ($projectForm->isSubmitted() && $projectForm->isValid()) {

            $em->persist($project);
            $em->flush();

            // Ajouter le message flash avant la redirection
            $this->addFlash('success', 'Votre projet a bien été modifié dans la base de données');

            return $this->redirectToRoute('admin_projects_index');
        }

        return $this->render('admin/project/edit.html.twig', [
            'projectForm' => $projectForm
        ]);
    }

    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(Project $project, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $em->remove($project);
        $em->flush();

        // Ajouter le message flash avant la redirection
        $this->addFlash('success', 'Votre projet a bien été supprimé dans la base de données');

        return $this->redirectToRoute('admin_projects_index');
    }
}
