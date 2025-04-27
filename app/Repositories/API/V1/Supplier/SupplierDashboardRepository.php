<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\JobApplication;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class SupplierDashboardRepository implements SupplierDashboardRepositoryInterface
{

    public function getTotalOrder(){
        try{
            $totalOrder = Order::where('user_id', auth()->user()->id)->count();
            $allOrder= Order::where('user_id', auth()->user()->id)->get();

        return [
            'totalOrder' => $totalOrder,
            'allOrder' => $allOrder
        ];
        }catch(\Exception $e){
            Log::error('App\Repositories\API\V1\Supplier\SupplierDashboardRepository:totalOrder', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getTotalProduct(){
        try{
            $totalProduct = Product::where('user_id', auth()->user()->id)->count();
        return $totalProduct;
        }catch(\Exception $e){
            Log::error('App\Repositories\API\V1\Supplier\SupplierDashboardRepository:totalProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getTotalJobApplication(){
        try{
            $totalJobApplication= JobApplication::where('user_id', auth()->user()->id)->count();
        return $totalJobApplication;
        }catch(\Exception $e){
            Log::error('App\Repositories\API\V1\Supplier\SupplierDashboardRepository:totalJobApplication', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
