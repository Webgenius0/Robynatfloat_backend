<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\User;
use App\Models\YachtJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class YachtJobRepository implements YachtJobRepositoryInterface {
    /**
     * Store a new YachtJob record.
     *
     * @param array $credentials
     * @return YachtJob
     * @throws Exception
     */
    public function storeYachtJob(array $credentials): YachtJob {
        try {
            return YachtJob::create($credentials);
        } catch (Exception $e) {
            Log::error('YachtJobRepository::storeYachtJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


   /**
 * Retrieve all yacht jobs.
 *
 * @param array $statusChange
 * @return Collection
 */
public function getAllJobs(array $statusChange): Collection
{
   try{
    $statusChange = YachtJob::where('status', $statusChange)->get();
        return $statusChange;
   }catch (\Exception $e) {
    Log::error('YachtJobRepository::getAllJobs', ['error' => $e->getMessage()]);
    throw $e;
}
}


    /**
     * Retrieve a yacht job by its ID.
     *
     * @param int $id
     * @return YachtJob|null
     */
    public function getJobById(int $id): ?YachtJob {
        return YachtJob::where('id', $id)->first();
    }


    /**
     * Update a yacht job record.
     *
     * @param int $id
     * @param array $data
     * @return YachtJob|null
     */
    public function updateYachtJob(int $id, array $data): ?YachtJob {
        $job = YachtJob::find($id);
        if ($job) {
            $job->update($data);
            $job = $job->fresh();
        }
        return $job;
    }

    public function getAllSupplier()
{
    // dd('getAllSupplier');
    // Your logic to get all suppliers
  try{
     $suppliers = User::with('profile','services','products')->where('role_id', 3)->get();
    return $suppliers;
  }
  catch (\Exception $e) {
    // Handle the exception
    Log::error('App\Repositories\API\V1\Supplier\SupplierRepository:getAllSupplier', ['error' => $e->getMessage()]);
    throw $e;

  }
}
}


