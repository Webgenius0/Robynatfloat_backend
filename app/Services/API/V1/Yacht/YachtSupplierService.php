<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtSupplierRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtSupplierService
{
    protected YachtSupplierRepositoryInterface $yachtSupplierRepository;
    public function __construct(YachtSupplierRepositoryInterface $yachtSupplierRepository)
    {
        $this->yachtSupplierRepository = $yachtSupplierRepository;
    }
    public function getAllSupplier()
    {
        // dd('getAllSupplier');
        // Your logic to get all suppliers
        try {
            $suppliers = $this->yachtSupplierRepository->getAllSupplier();
            return $suppliers;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Services\API\V1\Yacht\YachtSupplierService:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getSupplierBySlug($id)
    {
        // dd('getAllSupplier');
        // Your logic to get supplier by slug
        try {
            $supplier = $this->yachtSupplierRepository->getSupplierBySlug($id);
            return $supplier;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Services\API\V1\Yacht\YachtSupplierService:getSupplierBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    // Your service logic goes here
}
