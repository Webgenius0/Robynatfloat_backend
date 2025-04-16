<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtCrewRepositoryInterface
{
    // Define the methods your repository should implement
    public function getAllCrew();
    public function getCrewById($id);
}
