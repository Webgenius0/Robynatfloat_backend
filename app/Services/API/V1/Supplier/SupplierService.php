<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\SupplierRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SupplierService
{
    protected SupplierRepositoryInterface $supplierRepository;
    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }
    public function getAllSupplier()
    {
        try {
            $suppliers = $this->supplierRepository->getAllSupplier();
            return $suppliers;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Services\API\V1\Supplier\SupplierService:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    // Your service logic goes here
}
