<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\SupplierDashboardRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SupplierDashboardService
{
   protected SupplierDashboardRepositoryInterface $supplierDashboardRepository;

   public function __construct(SupplierDashboardRepositoryInterface $supplierDashboardRepository)
   {
       $this->supplierDashboardRepository = $supplierDashboardRepository;
   }

   public function getTotalOrder(){
    try {
        $totalOrder = $this->supplierDashboardRepository->getTotalOrder();
        return $totalOrder;
    } catch (\Exception $e) {
        Log::error('App\Services\API\V1\Supplier\SupplierDashboardService:getTotalOrder', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getTotalProduct(){
    try {
        $totalProduct = $this->supplierDashboardRepository->getTotalProduct();
        return $totalProduct;
    } catch (\Exception $e) {
        Log::error('App\Services\API\V1\Supplier\SupplierDashboardService:getTotalProduct', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getTotalJobApplication(){
    try {
        $totalJobApplication = $this->supplierDashboardRepository->getTotalJobApplication();
        return $totalJobApplication;
    } catch (\Exception $e) {
        Log::error('App\Services\API\V1\Supplier\SupplierDashboardService:getTotalJobApplication', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

}
