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
                'name' => 'Ferme de Warelles',
                'site_link' => 'https://fermedewarelles.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/r9p9oupFqemCvu8LSEiBkc/TEI---Octobre-2024?node-id=0-1&node-type=canvas&t=JLZ1C2jnSd4RS4Wh-0',
                'git_link' => 'https://github.com/asonkes/fermeDeTiti',
                'description' => 'Projet TEI',
                'image' => 'fermeDeWarelles.webp',
                'created_at' => '2024-11-04 18:17:53',
            ],
            [
                'name' => 'Jacadi',
                'site_link' => 'https://jacadi.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/w6XUCOSEukmwK0zdTs9kYm/Jacadi?node-id=0-1&node-type=canvas&t=CI1ssSLkar2WXsiG-0',
                'git_link' => 'https://github.com/asonkes/Jacadi',
                'description' => "Projet fin d'étude",
                'image' => 'jacadi.webp',
                'created_at' => '2024-06-26 18:21:20',
            ],
            [
                'name' => 'Speedcare',
                'site_link' => 'https://garage.audrey-sonkes.be/',
                'figma_link' => '',
                'git_link' => 'https://github.com/asonkes/garage',
                'description' => '1er Projet Symfony',
                'image' => 'garage.webp',
                'created_at' => '2023-12-03 17:27:44'
            ],
            [
                'name' => 'LollyPop',
                'site_link' => 'https://lollypop.audrey-sonkes.be/',
                'figma_link' => 'https://www.figma.com/design/MlXQKciGyBfEEL6uZAZzW8/Projet-examen-(version-ordinateur)?node-id=0-1&node-type=canvas&t=EYSRmEPJ2eJ5zgo4-0',
                'git_link' => 'https://github.com/asonkes/projet-fin-d-annee-2023',
                'description' => 'Projet Fin 1ère année',
                'image' => 'lollyPop.webp',
                'created_at' => '2023-06-26 18:25:19'
            ],
            [
                'name' => '50Nuances de Grey',
                'site_link' => 'https://50nuancesdegrey.audrey-sonkes.be/',
                'figma_link' => '',
                'git_link' => 'https://github.com/asonkes/50NuancesDeGrey',
                'description' => 'Projet Cours (HTML / CSS)',
                'image' => '50NuancesDeGrey.webp',
                'created_at' => '2022-12-26 17:30:18'
            ],
        ];

        foreach ($projectsData as $data) {
            $project = new Project();

            $project->setName($data['name']);
            $project->setSiteLink($data['site_link']);

            if ($data['figma_link'] !== 'null') {
                $project->setFigmaLink($data['figma_link']);
            } else {
                $project->setFigmaLink('');
            }

            $project->setGitLink($data['git_link']);
            $project->setDescription($data['description']);
            $project->setImage($data['image']);
            $project->setCreatedAt(new \DateTimeImmutable($data['created_at']));

            $manager->persist($project);
        }

        $manager->flush();
    }
}
