<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\Service;

interface ServiceRepositoryInterface
{
    // Define the methods your repository should implement

    public function serviceStore(array $credentials): Service;
    public function serviceIndex();
    public function serviceUpdate(array $credentials, Service $service, $slug): Service;
    public function serviceDelete($slug);
    public function serviceShow($slug);
}
