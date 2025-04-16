<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtSupplierOrderRepositoryInterface
{
    // Define the methods your repository should implement

    public function storeOrders(array $data);
    public function getOrders(array $data);
    public function getOrderById(int $id);
}
