<?php

namespace App\Http\Controllers\Web\Backend\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Web\Backend\V1\User\YacthService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class YacthController extends Controller
{
    use ApiResponse;
    //protected function
    protected YacthService $yacthService;
 //call the constructor function
 public function __construct(YacthService $yacthService)
 {
        $this->yacthService = $yacthService;
    }
    
    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->yacthService->index($request);
            }
            return view('backend.layouts.users.yacth.index');
        } catch (Exception $e) {
            Log::error('Error in YacthController@index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

//update the status of the Yacth user
    public function updateStatus(User $user)
    {
        try {
            $this->yacthService->updateStatus($user);
            return $this->success(200, 'Update Status Successful');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\User\YacthController::updateStatus', ['error' => $e->getMessage()]);
            return $this->error(500, 'Something went wrong. Please try again.');
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
