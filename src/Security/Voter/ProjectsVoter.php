<?php

namespace App\Security\Voter;

use App\Entity\Project;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ProjectsVoter extends Voter
{
    const EDIT = 'PROJECT_EDIT';
    const DELETE = 'PROJECT_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $project): bool
    {
        if (!in_array($attribute, [self::EDIT, self::DELETE])) {
            return false;
        }

        if (!$project instanceof Project) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $project, TokenInterface $token): bool
    {
        // On récupère l'utilisateur à partir du token
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        // On vérifie si l'utilisateur est "admin"
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }
    }
}
