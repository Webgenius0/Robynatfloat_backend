<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class CrueRepository implements CrueRepositoryInterface
{

    public function latestCrueList():mixed
    {
        try{
           return User::select('id','last_name','first_name','handle','email','status','role_id')->whereRoleId(2);
        }catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\CrueRepository::latestCrueList', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function crueStatusUpdate($id):mixed
    {
        try{
            $crue=User::FindOrFail($id);
            $newstatus = $crue->status == 1 ? 0 : 1;
            return $crue->update(['status' => $newstatus]);
        }
        catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\CrueRepository::crueStatusUpdate', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
