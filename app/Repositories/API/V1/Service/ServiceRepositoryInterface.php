<?php

namespace App\Repositories\API\V1\Service;

use App\Models\Service;

interface ServiceRepositoryInterface
{
    // Define the methods your repository should implement

    public function serviceStore(array $credentials): Service;
}
