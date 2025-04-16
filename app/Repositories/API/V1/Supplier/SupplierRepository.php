<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class SupplierRepository implements SupplierRepositoryInterface
{
    // Implement the methods defined in the SupplierRepositoryInterface
    public function getAllSupplier()
    {
        // dd('getAllSupplier');
        // Your logic to get all suppliers
      try{
         $suppliers = User::with('profile','services','products')->where('role_id', 3)->get();
        return $suppliers;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getAllSupplier', ['error' => $e->getMessage()]);
        throw $e;

      }
    }
}
