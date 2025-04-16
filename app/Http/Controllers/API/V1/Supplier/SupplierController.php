<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Supplier\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected SupplierService $supplierService;
    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function getAllSupplier()
    {
        try {
            $suppliers = $this->supplierService->getAllSupplier();
            return response()->json($suppliers, 200, ['message' => 'Suppliers fetched successfully.']);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json(['error' => 'An error occurred while fetching suppliers.'], 500);
        }

        // Your logic to get all suppliers
    }
    //
}
