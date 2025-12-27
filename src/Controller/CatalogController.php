<?php

declare(strict_types=1);

namespace App\Controller;

use App\Course\Handler\DefaultCourseHandler;
use App\DTO\Author;
use App\DTO\Category;
use App\DTO\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/catalog', name: 'app_catalog_')]
class CatalogController extends AbstractController
{
    // INJECTION DE DÉPENDANCE :
    // On demande à Symfony de nous donner le Handler dans le constructeur.
    public function __construct(private readonly DefaultCourseHandler $courseHandler)
    {
    }

    // Affiche le détail d'un cours (ex: /catalog/introduction-a-la-programmation)
    #[Route(path: '/{slug}', name: 'view')]
    public function show(string $slug): Response
    {
        $course = $this->courseHandler->getCourseBySlug($slug);

        if (null === $course) {
            throw $this->createNotFoundException('La page que vous demandez est introuvable.');
        }

        return $this->render('catalog/show.html.twig', [
            'course' => $course,
        ]);
    }

    // Affiche la liste complète (ex: /catalog/all)
    #[Route(path: '/all', name: 'all', priority: 1)]
    public function all(): Response
    {
        $courses = $this->courseHandler->fetchAllCourses();

        return $this->render('catalog/index.html.twig', [
            'courses' => $courses,
        ]);

        // http://localhost/catalog/all
    }

}
