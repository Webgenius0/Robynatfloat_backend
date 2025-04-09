<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Supplier\ProductSupplierRequest;
use App\Services\API\V1\Supplier\ProductSupplierService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductSupplierController extends Controller
{
    protected ProductSupplierService $productSupplierService;
    public function __construct(ProductSupplierService $productSupplierService)
    {
        $this->productSupplierService = $productSupplierService;
    }
    public function getAllSupplierProduct(Request $request)
    {
       try {
          $productSupplier= $this->productSupplierService->getAllSupplierProduct();
              return response()->json([
                'status' => true,
                'message' => 'Supplier products retrieved successfully',
                'data' => $productSupplier
              ], 200);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\ProductSupplierController:getAllSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function addSupplierProduct(ProductSupplierRequest $productSupplierRequest)
    {
        // dd($productSupplierRequest->all());
        try {
            $credentials = $productSupplierRequest->all();
            $productSupplier = $this->productSupplierService->addSupplierProduct($credentials);
            return response()->json([
                'status' => true,
                'message' => 'Supplier product added successfully',
                'data' => $productSupplier
            ], 201);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\ProductSupplierController:addSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierProductById($slug)
    {
        try {
            $productSupplier = $this->productSupplierService->getSupplierProductById($slug);
            return response()->json([
                'status' => true,
                'message' => 'Supplier product retrieved successfully',
                'data' => $productSupplier
            ], 200);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\ProductSupplierController:getSupplierProductById", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function updateSupplierProduct(ProductSupplierRequest $productSupplierRequest, $slug): JsonResponse
    {

        try {

            $credentials = $productSupplierRequest->validated();
       
            $productSupplier = $this->productSupplierService->updateSupplierProduct($slug, $credentials);
            return response()->json([
                'status' => true,
                'message' => 'Supplier product updated successfully',
                'data' => $productSupplier
            ], 200);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\ProductSupplierController:updateSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function deleteSupplierProduct($slug)
    {
        try {
            $productSupplier = $this->productSupplierService->deleteSupplierProduct($slug);
            return response()->json([
                'status' => true,
                'message' => 'Supplier product deleted successfully',
                'data' => $productSupplier
            ], 200);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\ProductSupplierController:deleteSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
