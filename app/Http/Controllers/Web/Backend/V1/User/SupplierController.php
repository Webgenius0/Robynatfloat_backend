<?php

namespace App\Http\Controllers\Web\Backend\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Web\Backend\V1\User\SupplierService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class SupplierController extends Controller
{
    use ApiResponse;
    //protected function
    protected SupplierService $supplierService;

    // constructor function
    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->supplierService->index($request);
            }



            return view('backend.layouts.users.supplier.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\SupplierController::view', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }


// Status Update for supplerController Users
    public function updateStatus(User $user){
        try {
            $this->supplierService->updateStatus($user);
            return $this->success(200,'Update Status Succefull');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\SupplierController::updateStatus', ['error' => $e->getMessage()]);
            return $this->error(500,'Update Status Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
