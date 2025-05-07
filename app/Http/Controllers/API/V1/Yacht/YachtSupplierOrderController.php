<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Yacht\YachtSupplierOrderRequest;
use App\Services\API\V1\Yacht\YachtSupplierOrderService;
use Illuminate\Http\Request;

class YachtSupplierOrderController extends Controller
{
    protected YachtSupplierOrderService $yachtSupplierOrderService;
    public function __construct(YachtSupplierOrderService $yachtSupplierOrderService)
    {
        $this->yachtSupplierOrderService = $yachtSupplierOrderService;
    }
    public function storeOrder(YachtSupplierOrderRequest $yachtSupplierOrderRequest)
    {
        try {
            $data = $yachtSupplierOrderRequest->validated();
            $order = $this->yachtSupplierOrderService->storeOrders($data);

            return $this->success(201, 'Order Created Successfully', $order);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order'], 500);
        }
    }
    public function getOrders(Request $request)
    {
        try {
            $orders = $this->yachtSupplierOrderService->getOrders($request->all());
            if ($orders->isEmpty()) {
                return response()->json(['message' => 'No orders found'], 404);
            }

            return $this->success(200, 'Orders Fetched Successfully', $orders);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve orders'], 500);
        }
    }
    public function getOrderById($id)
    {
        try {
            $order = $this->yachtSupplierOrderService->getOrderById($id);

            return $this->success(200, 'Order Fetched Successfully', $order);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve order'], 500);
        }
    }
}
