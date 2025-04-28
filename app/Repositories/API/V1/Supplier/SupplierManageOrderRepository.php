<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class SupplierManageOrderRepository implements SupplierManageOrderRepositoryInterface
{public function getAllOrder()
    {
        try {
            $userId = auth()->id();

            $orders = Order::whereHas('product', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

            return $orders;
        } catch (\Exception $e) {
            Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:getAllOrder', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function getSupplierOrderById($slug)
    {
        try {
            $userId = auth()->id();

            $order = Order::where('id', $slug)
                ->whereHas('product', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->first();

            return $order;
        } catch (\Exception $e) {
            Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:getSupplierOrderById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function updateSupplierOrderStatus($request, $slug)
{
    try {
        $userId = auth()->id();

        $order = Order::where('id', $slug)
            ->whereHas('product', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->first();

        if (!$order) {
            throw new \Exception('Order not found or unauthorized.');
        }

        $order->update([
            'status' => $request->input('status'),
        ]);

        return $order;
    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:updateSupplierOrderStatus', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function deleteSupplierOrder($slug)
{
    try {
        $userId = auth()->id();

        $order = Order::where('id', $slug)
            ->whereHas('product', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->first();

        if ($order) {
            $order->delete();
            return true;
        }

        return false;
    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:deleteSupplierOrder', ['error' => $e->getMessage()]);
        throw $e;
    }
}


public function supplierStatusChange($request)
{
    try {
        $userId = auth()->id();

        $orders = Order::where('status', $request->status)
            ->whereHas('product', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->count();

        return $orders;
    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:supplierStatusChange', ['error' => $e->getMessage()]);
        throw $e;
    }
}



}
