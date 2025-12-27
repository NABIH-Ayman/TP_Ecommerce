<?php

namespace App\Course\Handler;

use App\Course\Factory\DefaultCourseFactory;
use App\DTO\Author;
use App\DTO\Category;
use App\DTO\Course;

class DefaultCourseHandler implements SimilarCourseProviderInterface
{
    // Injection de dépendance : on récupère l'usine
    public function __construct(
        private readonly DefaultCourseFactory $factory,
    ) {
    }

    /**
     * Retourne la liste complète des cours
     */
    public function fetchAllCourses(): array
    {
        // 1. Les données brutes (simule un retour de base de données SQL)
        $rawData = [
            'introduction-a-la-programmation' => [
                'name' => 'Introduction à la programmation',
                'price' => 49.99,
                'synopsis' => 'Apprenez les bases de la programmation avec Python.',
                'description' => 'Ce cours couvre les fondamentaux...',
                'author' => 'Alice Dupont',
                'category' => 'Informatique'
            ],
            'analyse-financiere' => [
                'name' => 'Analyse financière',
                'price' => 79.00,
                'synopsis' => 'Comprendre les états financiers.',
                'description' => 'Ce cours vous guide à travers l’analyse...',
                'author' => 'Jean Martin',
                'category' => 'Finance'
            ],
            'photographie-numerique' => [
                'name' => 'Photographie numérique',
                'price' => 59.50,
                'synopsis' => 'Maîtrisez votre appareil photo.',
                'description' => 'Apprenez les techniques de prise de vue...',
                'author' => 'Sophie Bernard',
                'category' => 'Arts visuels'
            ]
        ];

        // 2. On transforme les données brutes en objets via l'usine
        $courses = [];
        foreach ($rawData as $slug => $data) {
            $courses[$slug] = $this->factory->create($data);
        }

        return $courses;
    }

    /**
     * Récupère un cours par son slug
     */
    public function getCourseBySlug(string $slug): Course|null
    {
        $courses = $this->fetchAllCourses();
        return $courses[$slug] ?? null;
    }

    public function getSimilarCourses(Course $course, int $limit): array
    {
        $courses = $this->fetchAllCourses();

        $keys = \array_flip(\array_rand($courses, $limit));

        return \array_intersect_ukey($courses, $keys, function (string $a, $b) {
            return $a <=> $b;
        });
    }

}
