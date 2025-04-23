<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\SupplierManageProductRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SupplierManageProductService
{
  protected SupplierManageProductRepositoryInterface $supplierManageProductRepository;
  public function __construct(SupplierManageProductRepositoryInterface $supplierManageProductRepository)
  {
    $this->supplierManageProductRepository = $supplierManageProductRepository;
  }
    public function getAllProduct()
    {
        try {
            return $this->supplierManageProductRepository->getAllProduct();
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\SupplierManageProductService::getAllProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function addSupplierProduct(array $credentials)
    {
        try {
            return $this->supplierManageProductRepository->addSupplierProduct($credentials);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\SupplierManageProductService:addSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierProductById($slug)
    {
        try {
            return $this->supplierManageProductRepository->getSupplierProductById($slug);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\SupplierManageProductService:getSupplierProductById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function updateSupplierProduct($slug, array $credentials)
    {
        try {
            return $this->supplierManageProductRepository->updateSupplierProduct($slug, $credentials);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\SupplierManageProductService:updateSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function deleteSupplierProduct($slug)
    {
        try {
            return $this->supplierManageProductRepository->deleteSupplierProduct($slug);
        } catch (\Exception $e) {
            Log::error('App\Services\API\V1\Supplier\SupplierManageProductService:deleteSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
