<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\ProductSupplierRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ProductSupplierService
{
    protected ProductSupplierRepositoryInterface $productSupplierRepository;
    public function __construct(ProductSupplierRepositoryInterface $productSupplierRepository)
    {
        $this->productSupplierRepository = $productSupplierRepository;
    }
    public function getAllSupplierProduct()
    {
        try {
            return $this->productSupplierRepository->getAllSupplierProduct();
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\ProductSupplierService:getAllSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function addSupplierProduct(array $credentials)
    {
        try {
            return $this->productSupplierRepository->addSupplierProduct($credentials);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\ProductSupplierService:addSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierProductById($slug)
    {
        try {
            return $this->productSupplierRepository->getSupplierProductById($slug);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\ProductSupplierService:getSupplierProductById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function updateSupplierProduct($slug, array $credentials)
    {
        try {
            return $this->productSupplierRepository->updateSupplierProduct($slug, $credentials);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\ProductSupplierService:updateSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function deleteSupplierProduct($slug)
    {
        try {
            return $this->productSupplierRepository->deleteSupplierProduct($slug);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\ProductSupplierService:deleteSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
