<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em): Response
    {
        $projects = $em->getRepository(Project::class)->findAll();

        // Création du formateur de date avec la locale française
        $formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
        // Permet d'afficher juste le mois et l'année
        $formatter->setPattern('MMMM yyyy');

        // Formater la date pour chaque projet
        foreach ($projects as $project) {
            // Format de la date pour chaque projet
            $formattedDate = $formatter->format($project->getCreatedAt());
            // Ajouter la date formatée à l'objet projet via une méthode "setFormattedDate"
            $project->setFormattedDate($formattedDate);
        }

        if (empty($projects)) {
            $this->addFlash('danger-project', "Nous n'avons pas trouvé de produits pour vous ! Désolé !");
        }

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
