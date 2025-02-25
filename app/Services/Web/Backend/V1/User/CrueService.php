<?php

namespace App\Services\Web\Backend\V1\User;

use App\Models\User;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\CrueRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CrueService
{
    //here is protected function
    protected CrueRepositoryInterface $crueRepository;
    protected UserRepositoryInterface $userRepository;

    public function __construct(CrueRepositoryInterface $crueRepository, UserRepositoryInterface $userRepository)
    {
        $this->crueRepository = $crueRepository;
        $this->userRepository = $userRepository;
    }

    public function index($request): JsonResponse
     {
        try {
            $crues = $this->crueRepository->latestCrueList();

            /**
             * applying search operation
             */
            if ($request->has('search') && $request->search) {
                $searchTerm = $request->search;
                $crues->where(function ($crues) use ($searchTerm) {
                    $crues->where('first_name', 'like', '%'. $searchTerm . '%')
                    ->orWhere('last_name', 'like', '%'. $searchTerm . '%')
                    ->orWhere('email', 'like', '%'. $searchTerm . '%');
                });
            }
            return DataTables::of($crues)
                ->addColumn('name', function ($data) {
                    return '<td class="ps-1">
                                <div class="d-flex align-items-center">
                                    <a href="#!"><img src="'.$data->avatar.'"
                                            alt="' . $data->first_name . ' ' . $data->last_name . '" class="avatar avatar-sm rounded-circle"></a>
                                    <div class="ms-2">
                                        <h5 class="mb-0">
                                            <a href="#!" class="text-inherit">' . $data->first_name . ' ' . $data->last_name . '</a>
                                        </h5>
                                    </div>
                                </div>
                            </td>';
                })
                ->addColumn('email', function ($data) {
                    return '<td>'.$data->email.'</td>';
                })
                ->addColumn('status', function ($data) {
                    return '<td>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" onclick="flexSwitchCheckChecked(\''.($data->handle).'\')" '.($data->status == 1 ? 'checked' : '').'>
                                </div>
                            </td>';
                })
                ->rawColumns(['name', 'email', 'status'])
                ->make(true);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\User\CrueService::index', ['error' => $e->getMessage()]);
            throw $e;
        }

    }

    public function crueUpdateStatus(User $user){
        try {
            $this->userRepository->changeStatus($user);
            return response()->json(['success'=>'Status updated successfully']);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\User\CrueService::crueUpdateStatus', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}

