<?php

namespace App\Course\Factory;

use App\DTO\Course;

abstract class AbstractCourseFactory
{
    /**
     * Reçoit un tableau de données et retourne un objet Course
     */
    abstract public function create(array $data): Course;

}
