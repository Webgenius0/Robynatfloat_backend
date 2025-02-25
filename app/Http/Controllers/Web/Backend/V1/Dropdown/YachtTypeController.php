<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Models\YachtType;
use App\Services\Web\Backend\V1\Dropdown\YachtTypeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtTypeController extends Controller
{
    protected YachtTypeService $yachtTypeService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\Dropdown\YachtTypeService $yachtTypeService
     */
    public function __construct(YachtTypeService $yachtTypeService)
    {
        $this->yachtTypeService = $yachtTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->yachtTypeService->index($request);
            }
            return view('backend.layouts.dropdown.yacht_type.index');
        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::create', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::store', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::edit', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::update', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::destroy', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }
}
