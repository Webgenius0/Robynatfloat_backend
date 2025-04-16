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

            return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order'], 500);
        }
    }
}
