<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ContactForm;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em, Request $request, MailerInterface $mailer): Response
    {
        // Permet d'afficher tous les projets dans la "TimeLine"
        $projects = $em->getRepository(Project::class)->findBy([], ['created_at' => 'DESC']);

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
            $this->addFlash('danger', "Nous n'avons pas trouvé de produits pour vous ! Désolé !");
        }

        // Création du formulaire 
        $contactForm = $this->createForm(ContactForm::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData();

            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $contactEmail = $data['email'];
            $message = $data['message'];

            $email = (new Email())
                ->from($contactEmail)
                ->to('audrey.sonkes@gmail.com')
                ->subject('Portfolio : nouveau message')
                ->text(sprintf(
                    "Vous avez reçu un nouveau message de votre site web :\n\nNom : %s\nPrénom : %s\nEmail : %s\nMessage :\n%s",
                    $lastname,
                    $firstname,
                    $contactEmail,
                    $message
                ));

            $mailer->send($email);

            // Ajouter le message flash avant la redirection
            $this->addFlash('success', 'Votre e-mail a bien été envoyé, nous y répondrons le plus vite possible.');

            return $this->redirectToRoute('home');
        }

        if ($contactForm->isSubmitted() && !$contactForm->isValid()) {

            // Ajouter le message flash avant la redirection
            $this->addFlash('danger', "Votre e-mail n'a pas été envoyé, des messages d'erreur sont peut-être apparus ! ");
        }

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
            'contactForm' => $contactForm
        ]);
    }
}
