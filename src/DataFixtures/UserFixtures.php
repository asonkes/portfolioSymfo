<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class UserFixtures extends Fixture
{
    // En fait pour pouvoir hasher le mot de passe (on a beosin  de l'interface 'hasher')
    public function __construct(private UserPasswordHasherInterface $passwordEncoder,) {}

    public function load(ObjectManager $manager): void
    {

        $admin = new User();
        $admin->setFirstname('Sonkes');
        $admin->setLastname('Audrey');
        $admin->setEmail('audrey.sonkes@gmail.com');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'ADT93hpk2020')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $manager->flush();
    }
}
