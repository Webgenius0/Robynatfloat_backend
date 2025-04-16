<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class YachtSupplierOrderRepository implements YachtSupplierOrderRepositoryInterface
{
    // Your Repository logic goes here

    public function storeOrders(array $data)
    {
        DB::beginTransaction();

        try {
            $createdOrders = [];

            foreach ($data['orders'] as $order) {
                $createdOrders[] = Order::create($order);
            }

            DB::commit();
            return $createdOrders;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('YachtSupplierOrderRepository::storeOrders', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getOrders(array $data)
    {
        try {
            return Order::all();
        } catch (\Exception $e) {
            Log::error('YachtSupplierOrderRepository::getOrders', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getOrderById(int $id)
    {
        try {
            return Order::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('YachtSupplierOrderRepository::getOrderById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
