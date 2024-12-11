<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projectsData = [
            [
                'object' => 'Projet TEI',
                'name' => 'Ferme de Warelles',
                'site_link' => 'https://fermedewarelles.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/r9p9oupFqemCvu8LSEiBkc/TEI---Octobre-2024?node-id=0-1&node-type=canvas&t=JLZ1C2jnSd4RS4Wh-0',
                'git_link' => 'https://github.com/asonkes/fermeDeTiti',
                'description' => "Site e-commerce en Symfony dédié à la la vente de produits Bio provenant de la ferme et d'autres producteurs locaux.
                Possibilité pour les utilisateurs de 'liker' différents produits, paiement en ligne via la plateforme 'Stripe'.
                Tout à été misé sur la fluidité de navigation pour le consommateur.
                La maquette de ce projet a été réalisée entièrement par mes soins.",
                'image' => 'fermeDeWarelles.webp',
                'created_at' => '2024-11-04 18:17:53',
                'code' => 'Symfony - PHP - SCSS - Twig - JS'
            ],
            [
                'object' => "Projet fin d'étude",
                'name' => 'Jacadi',
                'site_link' => 'https://jacadi.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/w6XUCOSEukmwK0zdTs9kYm/Jacadi?node-id=0-1&node-type=canvas&t=CI1ssSLkar2WXsiG-0',
                'git_link' => 'https://github.com/asonkes/Jacadi',
                'description' => "Site e-commerce en Symfony dédié à la vente de vêtements pour bébés (de 3 à 36mois) et pour enfants (de 2 à 14ans).
                La possibilité pour les utilisateurs de 'liker' différents produits n'est pas fonctionnelle, et le paiement en ligne n'est pas possible.
                De plus, la fluidité de navigation pour le consommateur me semble moins fluide.
                Tous les éléments manquants et les améliorations seront intégrés dans le projet de mon TEI. 
                La maquette de ce projet a été réalisée entièrement par mes soins.",
                'image' => 'jacadi.webp',
                'created_at' => '2024-06-26 18:21:20',
                'code' => 'Symfony - PHP - SCSS - Twig - JS'
            ],
            [
                'object' => "WordPress Examen",
                'name' => 'GossipCop',
                'site_link' => 'https://wordpress.audrey-sonkes.be/',
                'figma_link' => '',
                'git_link' => '',
                'description' => "Réalisation d'un projet en utilisant WordPress comme base.",
                'image' => 'gossipCop.webp',
                'created_at' => '2024-02-21 18:21:20',
                'code' => 'HTML - CSS - PHP - JS'
            ],
            [
                'object' => "1er Projet Symfony",
                'name' => 'Speedcare',
                'site_link' => 'https://garage.audrey-sonkes.be/',
                'figma_link' => '',
                'git_link' => 'https://github.com/asonkes/garage',
                'description' => "Mon 1er projet e-commerce en Symfony, base de données est existante mais l'intégration des images se fait essentiellement par URL.
                Il est possible de modifier les annonces en modifiant les URL.
                La fonctionnalité de connexion et de déconnexion fonctionnent.
                Et l'admin est reconnu lors de la connexion pour pouvoir modifier les annonces.
                La conception de la maquette a été fournie par notre professeur, et j'ai réalisé sa mise en œuvre en HTML et CSS.",
                'image' => 'garage.webp',
                'created_at' => '2023-12-03 17:27:44',
                'code' => 'Symfony - PHP - CSS - Twig - JS'
            ],
            [
                'object' => "Projet Fin 1ère année",
                'name' => 'LollyPop',
                'site_link' => 'https://lollypop.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/MlXQKciGyBfEEL6uZAZzW8/Projet-examen-(version-ordinateur)?node-id=0-1&node-type=canvas&t=EYSRmEPJ2eJ5zgo4-0',
                'git_link' => 'https://github.com/asonkes/projet-fin-d-annee-2023',
                'description' => "Projet de fin d'année 2023 entièrement réalisé en HTML et CSS.
                La conception de la mise en page a été entièrement imaginé par mes soins.",
                'image' => 'lollyPop.webp',
                'created_at' => '2023-06-26 18:25:19',
                'code' => 'HTML - CSS'
            ],
            [
                'object' => "Projet Cours (HTML / CSS)",
                'name' => '50Nuances de Grey',
                'site_link' => 'https://50nuancesdegrey.audrey-sonkes.be/',
                'figma_link' => '',
                'git_link' => 'https://github.com/asonkes/50NuancesDeGrey',
                'description' => 'Exercice réalisé entièrement en HTML et CSS.
                La conception de la mise en page a été entièrement imaginé par mes soins.',
                'image' => '50NuancesDeGrey.webp',
                'created_at' => '2022-12-26 17:30:18',
                'code' => 'HTML - CSS'
            ],
        ];

        foreach ($projectsData as $data) {
            $project = new Project();

            $project->setObject($data['object']);
            $project->setName($data['name']);
            $project->setSiteLink($data['site_link']);

            if ($data['figma_link'] !== 'null') {
                $project->setFigmaLink($data['figma_link']);
            } else {
                $project->setFigmaLink('');
            }

            if ($data['git_link'] !== 'null') {
                $project->setGitLink($data['git_link']);
            } else {
                $project->setGitLink('');
            }

            $project->setDescription($data['description']);
            $project->setImage($data['image']);
            $project->setCreatedAt(new \DateTimeImmutable($data['created_at']));
            $project->setCode($data['code']);

            $manager->persist($project);
        }

        $manager->flush();
    }
}
