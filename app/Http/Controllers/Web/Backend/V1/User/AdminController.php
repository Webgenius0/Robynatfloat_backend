<?php

namespace App\Http\Controllers\Web\Backend\V1\User;

use App\Http\Controllers\Controller;
use App\Services\Web\Backend\V1\User\AdminService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected AdminService $adminService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\User\AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * index for admin users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->adminService->index($request);
            }
            return view('backend.layouts.users.admin.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\AdminController::view', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

    public function updateStatus(string $id)
    {
        try {
            return $this->adminService->adminStatusUpdate($id);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\AdminController::updateStatus', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
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
