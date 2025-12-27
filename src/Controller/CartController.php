<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\AddToCartType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/product/headphones', name: 'app_product_headphones')]
    public function index(Request $request): Response
    {
        // 1. Création du formulaire
        $form = $this->createForm(AddToCartType::class);

        // 2. Gestion de la soumission (Si on clique sur Ajouter au panier)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Pour le TP, on affiche juste les données récupérées
            dd($form->getData());
        }

        // 3. Affichage de la vue
        return $this->render('cart/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
