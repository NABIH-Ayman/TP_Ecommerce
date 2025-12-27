<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\SubscribeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SubscribeController extends AbstractController
{
    // Cette méthode est appelée depuis le Layout (Twig)
    public function showForm(): Response
    {
        $form = $this->createForm(SubscribeType::class);

        return $this->render(
            'subscribe/index.html.twig',
            ['form' => $form]
        );
    }

    // Cette route gère la soumission du formulaire
    #[Route(path: '/subscribe', name: 'app_subscribe')]
    public function proceed(Request $request): Response
    {
        // Pour l'instant, on affiche juste les données reçues (Debug)
        dd($request->getPayload()->all());
    }
}
