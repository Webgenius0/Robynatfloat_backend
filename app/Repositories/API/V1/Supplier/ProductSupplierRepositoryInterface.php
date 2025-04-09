<?php

namespace App\Repositories\API\V1\Supplier;

interface ProductSupplierRepositoryInterface
{
    public function getAllSupplierProduct();
    public function addSupplierProduct(array $credentials);
    public function getSupplierProductById($slug);
    public function updateSupplierProduct($slug, array $credentials);
    public function deleteSupplierProduct($slug);
}
