<?php

namespace App\Course\Handler;

use App\DTO\Course;

interface SimilarCourseProviderInterface
{
    /**
     * Le contrat : Donnes-moi un cours, je te donne une liste de cours similaires.
     */
    public function getSimilarCourses(Course $course, int $limit): array;
}
