<?php

namespace App\Repositories\API\V1\Supplier;

interface SupplierMyJobRepositoryInterface
{
    public function getSuggestedJob();
    public function getSuggestedJobBySlug($slug);
}
