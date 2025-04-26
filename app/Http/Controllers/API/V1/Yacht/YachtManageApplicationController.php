<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Yacht\YachtManageApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtManageApplicationController extends Controller
{
   protected YachtManageApplicationService $yachtManageApplicationService;

    public function __construct(YachtManageApplicationService $yachtManageApplicationService)
    {
        $this->yachtManageApplicationService = $yachtManageApplicationService;
    }

    public function getJobApplication()
    {
        // dd($request->all());

        try {
            $jobApplication = $this->yachtManageApplicationService->getJobApplication();
            return $this->success(200, 'Job Application list', $jobApplication);
        } catch (\Exception $e) {
            Log::error('app/Http/Controllers/API/V1/Yacht/YachtManageApplicationController.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }

    public function getApplicationBySlug($slug)
    {
        try {
            $jobApplication = $this->yachtManageApplicationService->getJobApplicationBySlug($slug);
            return $this->success(200, 'Job Application list', $jobApplication);
        } catch (\Exception $e) {
            Log::error('app/Http/Controllers/API/V1/Yacht/YachtManageApplicationController.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
}
