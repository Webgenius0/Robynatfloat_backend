<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class SupplierRepository implements SupplierRepositoryInterface
{
    /**
     * supplier list order by dec based on Created_at
     */
    
    public function supplierList():mixed
    {
        try{
            return User::select('id','first_name','last_name','email','role_id','handle','status')->whereRoleId(3);

        } catch(Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\User\SupplierRepository::supplierList', ['error' => $e->getMessage()]);
            throw $e;


    }
}

}

