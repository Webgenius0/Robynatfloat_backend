<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Services\Web\Backend\V1\Dropdown\CountryTypeService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryTypeController extends Controller
{
    use ApiResponse;
   protected CountryTypeService $countryTypeService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\Dropdown\CountryTypeService $countryTypeService
     */


     public function __construct(CountryTypeService $countryTypeService)
    {
        $this->countryTypeService = $countryTypeService;
    }
      /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->countryTypeService->index($request);
            }
            return view('backend.layouts.dropdown.country_type.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CountryTypeController::index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }
}
