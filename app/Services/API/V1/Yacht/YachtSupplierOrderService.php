<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtSupplierOrderRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtSupplierOrderService
{
    // Your service logic goes here
    protected YachtSupplierOrderRepositoryInterface $yachtSupplierOrderRepository;
    public function __construct(YachtSupplierOrderRepositoryInterface $yachtSupplierOrderRepository)
    {
        $this->yachtSupplierOrderRepository = $yachtSupplierOrderRepository;
    }
    public function storeOrders(array $data)
    {
        try {
            return $this->yachtSupplierOrderRepository->storeOrders($data);
        } catch (\Exception $e) {
            Log::error('YachtSupplierOrderService::storeOrder', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getOrders(array $data)
    {
        try {
            return $this->yachtSupplierOrderRepository->getOrders($data);
        } catch (\Exception $e) {
            Log::error('YachtSupplierOrderService::getOrders', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getOrderById(int $id)
    {
        try {
            return $this->yachtSupplierOrderRepository->getOrderById($id);
        } catch (\Exception $e) {
            Log::error('YachtSupplierOrderService::getOrderById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
