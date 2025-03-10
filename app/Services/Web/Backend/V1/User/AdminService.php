<?php

namespace App\Services\Web\Backend\V1\User;

use App\Models\User;
use App\Repositories\Web\Backend\V1\User\AdminRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class AdminService
{
    protected UserRepositoryInterface $userRepository;
    protected AdminRepositoryInterface $adminRepository;

    /**
     * construct
     * @param \App\Repositories\Web\Backend\V1\User\UserRepositoryInterface $userRepository
     * @param \App\Repositories\Web\Backend\V1\User\AdminRepositoryInterface $adminRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,AdminRepositoryInterface $adminRepository)
    {
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
    }

    /**
     * returning the Yajra Table from fetched data
     * @param mixed $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($request): JsonResponse
    {
        try {
            $admins = $this->adminRepository->latestAdminList();
            /**
             * applying search operation
             */
            if ($request->has('search') && $request->search) {
                $searchTerm = $request->search;
                $admins->where(function ($admins) use ($searchTerm) {
                    $admins->where('first_name', 'like', '%'. $searchTerm . '%')
                    ->orWhere('last_name', 'like', '%'. $searchTerm . '%')
                    ->orWhere('email', 'like', '%'. $searchTerm . '%');
                });
            }
            return DataTables::of($admins)
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
            Log::error('App\Services\Web\Backend\V1\User\AdminService::index', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * admin Status Update
     * @param \App\Models\User $user
     * @return void
     */
    public function adminStatusUpdate(User $user)
    {
        try {
            $this->userRepository->changeStatus($user);
        }catch(Exception $e){
            Log::error('App\Services\Web\Backend\V1\User\AdminService::adminStatusUpdate', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
