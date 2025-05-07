<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class YachtCrewRepository implements YachtCrewRepositoryInterface
{
    // Your Repository logic goes here
    public function getAllCrew()
    {
        // dd('getAllSupplier');
        // Your logic to get all suppliers
      try{
         $crews = User::with('profile')->where('role_id', 4)->paginate(10);
        return $crews;
      }
      catch (\Exception $e) {
        // Handle the exception
        Log::error('App\Repositories\API\V1\Yacht\YachtCrewRepository:getAllCrew', ['error' => $e->getMessage()]);
        throw $e;

      }
    }
    public function getCrewById($id)
    {
        // Your logic to get a single supplier by ID
        try{
            $crew = User::with('profile')->where('role_id', 4)->findOrFail($id);
            return $crew;
        }
        catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Repositories\API\V1\Yacht\YachtCrewRepository:getCrewById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
