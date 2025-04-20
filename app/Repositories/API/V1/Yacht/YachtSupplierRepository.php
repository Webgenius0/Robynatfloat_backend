<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class YachtSupplierRepository implements YachtSupplierRepositoryInterface
{
    public function getAllSupplier()
    {
        // dd('getAllSupplier');
        // Your logic to get all suppliers
      try{
         $suppliers = User::with('profile')->where('role_id', 3)->get();
        return $suppliers;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getAllSupplier', ['error' => $e->getMessage()]);
        throw $e;

      }
    }

    public function getSupplierBySlug($id)
    {

      try{
         $supplier = User::with('profile','services', 'services.images','products', 'products.images')->where('role_id', 3)->where('id', $id)->first();
        return $supplier;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getSupplierBySlug', ['error' => $e->getMessage()]);
        throw $e;

      }
    }

    public function getSupplierProducts()
    {
      try{
        $supplierProducts = Product::with('images')->get();
        return $supplierProducts;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getSupplierProducts', ['error' => $e->getMessage()]);
        throw $e;

      }
    }
    public function getSupplierProductBySlug($slug)
    {
      try{
        $supplierProduct = Product::with('images')->where('slug', $slug)->first();
        return $supplierProduct;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getSupplierProductBySlug', ['error' => $e->getMessage()]);
        throw $e;

      }
    }
}
