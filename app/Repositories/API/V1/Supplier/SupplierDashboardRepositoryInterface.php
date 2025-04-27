<?php

namespace App\Repositories\API\V1\Supplier;

interface SupplierDashboardRepositoryInterface
{
    public function getTotalOrder();
    public function getTotalProduct();
    public function getTotalJobApplication();


}
