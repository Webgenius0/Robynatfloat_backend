<?php

namespace App\Http\Controllers\Web\Backend\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Web\Backend\V1\User\CrueService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Log;


class CrueController extends Controller
{
    use ApiResponse;
    protected CrueService $crueService;

    public function __construct(CrueService $crueService)
    {
        $this->crueService = $crueService;
    }
    /**
     * Display a listing of the resource.
     */

     /**
     * index for admin users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

     public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->crueService->index($request);
            }
            return view('backend.layouts.users.crue.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\CreuController::view', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Status update for crue users.
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(User $user): JsonResponse{

        try {
         $this->crueService->crueUpdateStatus($user);
         return $this->success(200, 'status updated');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\CreuController::crueUpdateStatus', ['error' => $e->getMessage()]);
            return $this->error(500, 'server error', $e->getMessage());

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
