<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\Country;
use Exception;
use Illuminate\Support\Facades\Log;

class CountryTypeRepository implements CountryTypeRepositoryInterface
{

    //Called country type repository
    public function listOfCountryType():mixed
    {
       try {
        return Country::select('id','name','slug')->latest();
    } catch (Exception $e) {
        Log::error('App\Repositories\Web\Backend\V1\Dropdown\CountryTypeRepository::listOfCountryType', ['error' => $e->getMessage()]);
        throw $e;
    }
    }
}
