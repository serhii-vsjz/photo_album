<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

interface ImageRepositoryInterface
{
    public function getImagesByCategoryId(int $categoryId): ?Collection;
}