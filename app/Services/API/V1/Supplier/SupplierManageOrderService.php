<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\SupplierManageOrderRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SupplierManageOrderService
{
   protected SupplierManageOrderRepositoryInterface $supplierManageOrderRepository;
    public function __construct(SupplierManageOrderRepositoryInterface $supplierManageOrderRepository)
    {
         $this->supplierManageOrderRepository = $supplierManageOrderRepository;
    }
    public function getAllOrder(){
        try{
            return $this->supplierManageOrderRepository->getAllOrder();
        }catch (\Exception $e){
            Log::error('App\Services\API\V1\Supplier\SupplierManageOrderService:getAllOrder', ['error' => $e->getMessage()]);
            throw $e;
    }
}
    public function getSupplierOrderById($slug){
        try{
            return $this->supplierManageOrderRepository->getSupplierOrderById($slug);
        }catch (\Exception $e){
            Log::error('App\Services\API\V1\Supplier\SupplierManageOrderService:getSupplierOrderById', ['error' => $e->getMessage()]);
            throw $e;
    }
}
    public function updateSupplierOrderStatus($request, $slug){
        try{
            return $this->supplierManageOrderRepository->updateSupplierOrderStatus($request, $slug);
        }catch (\Exception $e){
            Log::error('App\Services\API\V1\Supplier\SupplierManageOrderService:updateSupplierOrder', ['error' => $e->getMessage()]);
            throw $e;
    }
}
    public function deleteSupplierOrder($slug){
        try{
            return $this->supplierManageOrderRepository->deleteSupplierOrder($slug);
        }catch (\Exception $e){
            Log::error('App\Services\API\V1\Supplier\SupplierManageOrderService:deleteSupplierOrder', ['error' => $e->getMessage()]);
            throw $e;
    }
}

}
