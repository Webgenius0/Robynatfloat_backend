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
}
