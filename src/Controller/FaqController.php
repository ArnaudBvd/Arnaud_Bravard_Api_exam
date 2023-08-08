<?php

namespace App\Controller;

use App\Entity\Faq;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FaqController extends AbstractController
{
    #[Route('/api/up/{faq}', name: 'app_faq_up', methods:['PATCH'])]
    public function incrementScore(Faq $faq, EntityManagerInterface $em, SerializerInterface $serializer): Response
    {
        $faq->setScore($faq->getScore() + 1);
        $em->persist($faq);
        $em->flush();

        return $this->json(json_decode($serializer->serialize($faq, 'json')));
    }

    #[Route('/api/down/{faq}', name: 'app_faq_down', methods:['PATCH'])]
    public function decrementScore(Faq $faq, EntityManagerInterface $em, SerializerInterface $serializer): Response
    {
        $faq->setScore($faq->getScore() - 1);
        $em->persist($faq);
        $em->flush();

        return $this->json(json_decode($serializer->serialize($faq, 'json')));
    }
}
