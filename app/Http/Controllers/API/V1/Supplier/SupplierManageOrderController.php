<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Yacht\YachtSupplierOrderRequest;
use App\Services\API\V1\Supplier\SupplierManageOrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;

class SupplierManageOrderController extends Controller
{
    protected SupplierManageOrderService $supplierManageOrderService;
    public function __construct(SupplierManageOrderService $supplierManageOrderService)
    {
        $this->supplierManageOrderService = $supplierManageOrderService;
    }
    public function getAllOrder(){
        // dd('getAllOrder');
        try{
            $response = $this->supplierManageOrderService->getAllOrder();
            if (!$response) {
                return $this->error(404, 'No orders found');
            }
            return $this->success( 200, 'Order list retrieved successfully',$response);

        }catch (\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierManageOrderController:getAllOrder', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierOrderById($slug){
        // dd('getSupplierOrderById');
        try{
            $response = $this->supplierManageOrderService->getSupplierOrderById($slug);
            if (!$response) {
                return $this->error(404, 'No orders found');
            }
            return $this->success( 200, 'Order list retrieved successfully',$response);

        }catch (\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierManageOrderController:getSupplierOrderById', ['error' => $e->getMessage()]);
            throw $e;
        }
}

public function updateSupplierOrderStatus(Request $request, $slug)
{
    // dd('updateSupplierOrderStatus');
    try{
        $response = $this->supplierManageOrderService->updateSupplierOrderStatus($request, $slug);
        if (!$response) {
            return $this->error(404, 'No orders found');
        }
        return $this->success( 200, 'Order Updated successfully',$response);

    }catch (\Exception $e){
        Log::error('App\Http\Controllers\API\V1\Supplier\SupplierManageOrderController:updateSupplierOrderStatus', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function deleteSupplierOrder($slug)
{
    // dd('deleteSupplierOrder');
    try{
        $response = $this->supplierManageOrderService->deleteSupplierOrder($slug);
        if (!$response) {
            return $this->error(404, 'No orders found');
        }
        return $this->success( 200, 'Order delete successfully',$response);

    }catch (\Exception $e){
        Log::error('App\Http\Controllers\API\V1\Supplier\SupplierManageOrderController:deleteSupplierOrder', ['error' => $e->getMessage()]);
        throw $e;
    }
}
}
