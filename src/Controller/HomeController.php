<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

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

    #[Route('/contact', name: 'contact', methods: ['POST'])]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        //Les données du formulaire
        $lastname = $request->get('lastname');
        $firstname = $request->get('firstname');
        $email = $request->get('email');
        $message = $request->get('message');

        if (!$lastname || !$firstname || !$email || !$message) {
            $this->addFlash('error', 'Nous sommes désolés mais tous les champs du formulaire doivent être remplis.');
            return $this->redirectToRoute('home');
        }

        //On envoie le mail
        $mailContact = (new Email())
            ->from($email)
            ->to('audrey.sonkes@gmail.com')
            ->subject('Nouveau message de ' . $firstname . ' ' . $lastname)
            ->text(sprintf(
                "Vous avez reçu un nouveau message de votre site web :\n\nNom : %s\nPrénom : %s\nEmail : %s\nMessage :\n%s",
                $lastname,
                $firstname,
                $email,
                $message
            ));

        try {
            $mailer->send($mailContact);

            $this->addFlash('success', 'Votre mail a bien été envoyé, nous vous répondrons le plus rapidement possible');

            return $this->redirectToRoute('home');
        } catch (\Exception $e) {
            $this->addFlash('danger', "Votre mail n'a pu être envoyé, veuillez réessayer");

            return $this->redirectToRoute('home');
        }

        return $this->redirectToRoute('home');
    }
}
