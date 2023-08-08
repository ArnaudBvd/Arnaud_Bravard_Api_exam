<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(SerializerInterface $serializer): Response
    {
        $user = $this->getUser();

        return $this->json(json_decode($serializer->serialize($user, "json")));
    }
}
