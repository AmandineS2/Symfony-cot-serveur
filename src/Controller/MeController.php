<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class MeController 
{
    #[Route('/api/me', name: 'app_me', methods:['GET'])]
    public function getCurrentUser(UserInterface $user): JsonResponse
    {
        $userData = [
            'email' => $user->getEmail(),
          	'firstname' => $user->getFirstname()
        ];

        return new JsonResponse($userData);
    }
}
