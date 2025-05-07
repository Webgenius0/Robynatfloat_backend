<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Yacht\YachtSupplierService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtSupplierController extends Controller
{
    protected YachtSupplierService $yachtSupplierService;
    public function __construct(YachtSupplierService $yachtSupplierService)
    {
        $this->yachtSupplierService = $yachtSupplierService;
    }
    public function getAllSupplier()
    {
        // dd('getAllSupplier');
        try {
            $suppliers = $this->yachtSupplierService->getAllSupplier();
          return $this->success(200, 'Supplier List Fetched Successfully', $suppliers);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Http\Controllers\API\V1\Yacht\YachtSupplierController:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierBySlug($id)
    {
        // dd('getAllSupplier');
        try {
            $supplier = $this->yachtSupplierService->getSupplierBySlug($id);
            if (!$supplier) {
                return response()->json(['message' => 'Supplier not found'], 404);
            }
           return $this->success(200, 'Supplier List Fetched Successfully', $supplier);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Http\Controllers\API\V1\Yacht\YachtSupplierController:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierProducts()
    {
        // dd('getAllSupplier');
        try {
            $supplier = $this->yachtSupplierService->getSupplierProducts();
            if (!$supplier) {
                return response()->json(['message' => 'Supplier not found'], 404);
            }
           return $this->success(200, 'Supplier Product List Fetched Successfully', $supplier);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Http\Controllers\API\V1\Yacht\YachtSupplierController:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    // public function getSupplierProducts($Slug)

    public function getSupplierProductBySlug($slug)
    {
        // dd('getAllSupplier');
        try {
            $supplier = $this->yachtSupplierService->getSupplierProductBySlug($slug);
            if (!$supplier) {
                return response()->json(['message' => 'Supplier not found'], 404);
            }
           return $this->success(200, 'Supplier Product List Fetched Successfully', $supplier);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Http\Controllers\API\V1\Yacht\YachtSupplierController:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
