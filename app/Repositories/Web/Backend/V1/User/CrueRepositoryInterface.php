<?php

namespace App\Repositories\Web\Backend\V1\User;

interface CrueRepositoryInterface
{
    public function latestCrueList(): mixed;

    public function crueStatusUpdate($id): mixed;
}
