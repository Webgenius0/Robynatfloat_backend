<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Yacht\YachtFreelancerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtFreelancerController extends Controller
{
  protected YachtFreelancerService $yachtFreelancerService;
  public function __construct(YachtFreelancerService $yachtFreelancerService)
  {
    $this->yachtFreelancerService = $yachtFreelancerService;
  }
  public function getAllFreelancer()
  {
    try {
      $freelancers= $this->yachtFreelancerService->getAllFreelancer();
      return $this->success(200, 'All Freelancer list', $freelancers);
    } catch (\Exception $e) {
      Log::error('YachtFreelancerController::getAllFreelancer', ['error' => $e->getMessage()]);
      throw $e;
    }
  }
    public function getFreelancerById(int $id)
    {
        try {
        $freelancer= $this->yachtFreelancerService->getFreelancerById($id);
        return $this->success(200, 'Single Freelancer list', $freelancer);
        } catch (\Exception $e) {
        Log::error('YachtFreelancerController::getFreelancerById', ['error' => $e->getMessage()]);
        throw $e;
        }
    }
}
