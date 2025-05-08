<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Supplier\SupplierDashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierDashboardController extends Controller
{
    protected SupplierDashboardService $supplierDashboardService;

    public function __construct(SupplierDashboardService $supplierDashboardService)
    {
        $this->supplierDashboardService = $supplierDashboardService;
    }
    public function getTotalOrder(){
        try {
            $totalOrder = $this->supplierDashboardService->getTotalOrder();
            return $this->success(200, 'Order list retrieved successfully', $totalOrder);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierDashboardController:getTotalOrder', ['error' => $e->getMessage()]);
            throw $e;
        }

        }
        public function getTotalProduct(){
            try {
                $totalProduct = $this->supplierDashboardService->getTotalProduct();
                return $this->success(200, 'Total Count list successfully', $totalProduct);
            } catch (\Exception $e) {
                Log::error('App\Http\Controllers\API\V1\Supplier\SupplierDashboardController:getTotalProduct', ['error' => $e->getMessage()]);
                throw $e;
            }
        }
        public function getTotalJobApplication(){
            try {
                $totalJobApplication = $this->supplierDashboardService->getTotalJobApplication();
                return $this->success(200, 'Job Application list retrieved successfully', $totalJobApplication);
            } catch (\Exception $e) {
                Log::error('App\Http\Controllers\API\V1\Supplier\SupplierDashboardController:getTotalJobApplication', ['error' => $e->getMessage()]);
                throw $e;
            }
        }
    }
