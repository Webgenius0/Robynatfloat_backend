<?php

namespace App\Repositories\API\V1\Supplier;

interface SupplierManageOrderRepositoryInterface
{
    public function getAllOrder();
    public function getSupplierOrderById($slug);
    public function updateSupplierOrderStatus($request, $slug);
    public function deleteSupplierOrder($slug);
    public function supplierStatusChange($request);
}
