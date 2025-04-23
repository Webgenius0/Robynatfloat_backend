<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\Order;
use Illuminate\Support\Facades\Log;

class SupplierManageOrderRepository implements SupplierManageOrderRepositoryInterface
{
   public function getAllOrder()
   {
    // dd('getAllOrder');
    try {
        $userId = auth()->id();
// dd($userId);
        $order= Order::where('user_id', $userId)->get(); // Fetch only user's orders
        return $order;
    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:getAllOrder', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getSupplierOrderById($slug)
   {
    // dd('getSupplierOrderById');
    try {
        $userId = auth()->id();
        $order= Order::where('user_id', $userId)->where('id', $slug)->first(); // Fetch only user's orders
        return $order;
    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:getSupplierOrderById', ['error' => $e->getMessage()]);
        throw $e;
    }
   }
    public function updateSupplierOrderStatus($request, $slug)
    {
     // dd('updateSupplierOrder');
     try {
        // dd($request->all());
          $userId = auth()->id();
        //   dd($userId);
          $order= Order::where('user_id', $userId)->where('id', $slug)->first(); // Fetch only user's orders

          $order->update([
            'status' => $request->input('status'),
        ]);
        // dd($order);
          return $order;
     } catch (\Exception $e) {
          Log::error('App\Repositories\API\V1\Supplier\SupplierManageOrderRepository:updateSupplierOrder', ['error' => $e->getMessage()]);
          throw $e;
     }
    }
    public function deleteSupplierOrder($slug)
    {
     // dd('deleteSupplierOrder');
     try {
          $userId = auth()->id();
          $order= Order::where('user_id', $userId)->where('id', $slug)->first(); // Fetch only user's orders
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

}
