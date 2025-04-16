<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtFreelancerRepositoryInterface
{

    public function getAllFreelancer();

    public function getFreelancerById($id);
}
