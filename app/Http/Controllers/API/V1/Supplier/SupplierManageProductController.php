<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Supplier\ProductSupplierRequest;
use App\Services\API\V1\Supplier\SupplierManageProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierManageProductController extends Controller
{
    protected SupplierManageProductService $supplierManageProductService;
    public function __construct(SupplierManageProductService $supplierManageProductService)
    {
        $this->supplierManageProductService = $supplierManageProductService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProduct(){
        try {
            $response = $this->supplierManageProductService->getAllProduct();
            return $this->success(200, 'All Product List.', $response);
        } catch (\Exception $e) {
           Log::error('App\Http\Controllers\API\V1\Supplier\SupplierManageProductController::getAllProduct', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Server Error'], 500);
        }

    }


    public function addSupplierProduct(ProductSupplierRequest $productSupplierRequest)
    {
        // dd($productSupplierRequest->all());
        try {
            $credentials = $productSupplierRequest->all();
            $productSupplier = $this->supplierManageProductService->addSupplierProduct($credentials);
            return $this->success(201, 'Supplier product added successfully', $productSupplier);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\SupplierManageProductController:addSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getSupplierProductById($slug)
    {
        try {
            $productSupplier = $this->supplierManageProductService->getSupplierProductById($slug);
            return $this->success(200, 'Supplier product retrieved successfully', $productSupplier);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\SupplierManageProductController:getSupplierProductById", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function updateSupplierProduct(ProductSupplierRequest $productSupplierRequest, $slug): JsonResponse
    {

        try {

            $credentials = $productSupplierRequest->validated();

            $productSupplier = $this->supplierManageProductService->updateSupplierProduct($slug, $credentials);
            return $this->success(200, 'Supplier product updated successfully', $productSupplier);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\SupplierManageProductController:updateSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function deleteSupplierProduct($slug)
    {
        try {
            $productSupplier = $this->supplierManageProductService->deleteSupplierProduct($slug);
            return $this->success(200, 'Supplier product deleted successfully', $productSupplier);
        } catch (\Exception $e) {
            Log::error("App\Http\Controllers\API\V1\Supplier\SupplierManageProductController:deleteSupplierProduct", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    //
}
