<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtSupplierRepositoryInterface
{
    // Define the methods your repository should implement
    public function getAllSupplier();
    public function getSupplierBySlug($id);
}
