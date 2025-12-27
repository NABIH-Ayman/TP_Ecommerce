<?php

namespace App\Course\Factory;

use App\DTO\Author;
use App\DTO\Category;
use App\DTO\Course;

class DefaultCourseFactory extends AbstractCourseFactory
{
    public function create(array $data): Course
    {
        // On fabrique l'objet Course proprement
        return new Course(
            name: $data['name'],
            price: (float) $data['price'],
            synopsis: $data['synopsis'],
            description: $data['description'],
            // On crée les objets imbriqués à la volée
            author: new Author($data['author']),
            category: new Category($data['category'])
        );
    }
}
