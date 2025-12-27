<?php

namespace App\Course\Handler;

use App\DTO\Author;
use App\DTO\Category;
use App\DTO\Course;

class DefaultCourseHandler
{
    /**
     * Retourne la liste complète des cours
     */
    public function fetchAllCourses(): array
    {
        return [
            'introduction-a-la-programmation' => new Course(
                name: 'Introduction à la programmation',
                price: 49.99,
                synopsis: 'Apprenez les bases de la programmation avec Python.',
                description: 'Ce cours couvre les fondamentaux de la programmation, y compris les variables, les boucles, les fonctions et les structures de données.',
                author: new Author('Alice Dupont'),
                category: new Category('Informatique')
            ),
            'analyse-financiere' => new Course(
                name: 'Analyse financière',
                price: 79.00,
                synopsis: 'Comprendre les états financiers et les indicateurs clés.',
                description: 'Ce cours vous guide à travers l’analyse des bilans, des comptes de résultat et des flux de trésorerie.',
                author: new Author('Jean Martin'),
                category: new Category('Finance')
            ),
            'photographie-numerique' => new Course(
                name: 'Photographie numérique',
                price: 59.50,
                synopsis: 'Maîtrisez votre appareil photo et composez des images percutantes.',
                description: 'Apprenez les techniques de prise de vue, de composition, et de retouche photo avec des outils professionnels.',
                author: new Author('Sophie Bernard'),
                category: new Category('Arts visuels')
            )
        ];
    }

    /**
     * Récupère un cours par son slug
     */
    public function getCourseBySlug(string $slug): Course|null
    {
        $courses = $this->fetchAllCourses();

        return $courses[$slug] ?? null;
    }
}
