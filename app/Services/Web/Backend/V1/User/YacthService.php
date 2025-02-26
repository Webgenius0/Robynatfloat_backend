<?php

namespace App\Services\Web\Backend\V1\User;

use App\Models\User;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\YacthRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class YacthService
{
   //protected  the function that  called  from YacthRepositoryInterface
   protected YacthRepositoryInterface $yacthRepository;
   // protected  the function that  called  from UserRepositoryInterface
   protected UserRepositoryInterface $userRepository;

   // call the constructor function for YacthRepositoryInterface and UserRepositoryInterface
   public function __construct(YacthRepositoryInterface $yacthRepository , UserRepositoryInterface $userRepository)
   {
      $this->yacthRepository = $yacthRepository;
      $this->userRepository = $userRepository;
   }

   public function index($request){
    try{
     $yacths= $this->yacthRepository->yachtList();

     //applying search operation
     if ($request->has('search') && $request->search) {
        $searchTerm = $request->search;
        $yacths->where(function ($yacths) use ($searchTerm) {
            $yacths->where('first_name', 'like', '%'. $searchTerm . '%')
            ->orWhere('last_name', 'like', '%'. $searchTerm . '%')
            ->orWhere('email', 'like', '%'. $searchTerm . '%');
        });
    }
    //here is yajara datatable called

    return DataTables::of($yacths)
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
Log::error('App\Services\Web\Backend\V1\User\YacthService::index', ['error' => $e->getMessage()]);
throw $e;
}
}

//Status Update for SupplierService users
public function updateStatus(User $user){
 try {
     $this->userRepository->changeStatus($user);
 } catch (Exception $e) {
     Log::error('App\Services\Web\Backend\V1\User\YacthService::updateStatus', ['error' => $e->getMessage()]);
     throw $e;
 }
}
}
