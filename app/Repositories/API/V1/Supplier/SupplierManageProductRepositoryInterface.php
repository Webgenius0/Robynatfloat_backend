<?php

namespace App\Repositories\API\V1\Supplier;

interface SupplierManageProductRepositoryInterface
{
 public function getAllProduct();
 public function addSupplierProduct(array $credentials);
 public function getSupplierProductById($slug);
 public function updateSupplierProduct($slug, array $credentials);
 public function deleteSupplierProduct($slug);
}
