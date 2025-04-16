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
           return response()->json($suppliers, 200,['message' => 'Supplier List Fetched Successfully']);
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
           return response()->json($supplier, 200,['message' => 'Supplier List Fetched Successfully']);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Http\Controllers\API\V1\Yacht\YachtSupplierController:getAllSupplier', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
