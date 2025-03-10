<?php

namespace App\Services\Web\Backend\V1\User;

use App\Models\User;
use App\Repositories\Web\Backend\V1\User\SupplierRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SupplierService
{
    //here is protected function
    protected SupplierRepositoryInterface $supplierRepository;
    protected UserRepositoryInterface $userRepository;

    //here is constructor function
    public function __construct(SupplierRepositoryInterface $supplierRepository, UserRepositoryInterface $userRepository)
    {
        $this->supplierRepository = $supplierRepository;
        $this->userRepository = $userRepository;
    }
    //here is function to get all suppliers
    public function index($request){
       try{
        $suppliers= $this->supplierRepository->supplierList();

        //applying search operation
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $suppliers->where(function ($suppliers) use ($searchTerm) {
                $suppliers->where('first_name', 'like', '%'. $searchTerm . '%')
                ->orWhere('last_name', 'like', '%'. $searchTerm . '%')
                ->orWhere('email', 'like', '%'. $searchTerm . '%');
            });
        }
       //here is yajara datatable called

       return DataTables::of($suppliers)
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
 Log::error('App\Services\Web\Backend\V1\User\SupplierService::index', ['error' => $e->getMessage()]);
throw $e;
}
}

//Status Update for SupplierService users
public function updateStatus(User $user){
    try {
        $this->userRepository->changeStatus($user);
    } catch (Exception $e) {
        Log::error('App\Services\Web\Backend\V1\User\SupplierService::updateStatus', ['error' => $e->getMessage()]);
        throw $e;
    }
}

}
