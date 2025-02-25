<?php

namespace App\Services\Web\Backend\V1\User;

use App\Models\User;
use App\Repositories\Web\Backend\V1\User\FreelancerRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class FreelancerService
{
    protected FreelancerRepositoryInterface $freelancerRepository;
    protected UserRepositoryInterface $userRepository;

    public function __construct(FreelancerRepositoryInterface $freelancerRepository, UserRepositoryInterface $userRepository)
    {
        $this->freelancerRepository = $freelancerRepository;
        $this->userRepository = $userRepository;
    }

    /**
     *
     * @param Request $request
     * @return JsonResponse
     */

    public function index($request): JsonResponse
    {
        try {
          $freelancer= $this->freelancerRepository->listFreelancer();

        //Apply for searching

          if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $freelancer->where(function ($freelancer) use ($searchTerm) {
                $freelancer->where('first_name', 'like', '%'. $searchTerm . '%')
                ->orWhere('last_name', 'like', '%'. $searchTerm . '%')
                ->orWhere('email', 'like', '%'. $searchTerm . '%');
            });
        }
        // Here Align the data with yajra datatable

            return DataTables::of($freelancer)
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
    }
    catch(Exception $e) {
        Log::error('App\Services\Web\Backend\V1\User\FreelancerService::index', ['error' => $e->getMessage()]);
        throw $e;
    }
}


public function freelancerStatusUpdate(User $user)
{
    try{
        $this->userRepository->changeStatus($user);
    }
    catch(Exception $e){
        Log::error('App\Services\Web\Backend\V1\User\FreelancerService::freelancerStatusUpdate', ['error' => $e->getMessage()]);
        throw $e;
    }
}

}
