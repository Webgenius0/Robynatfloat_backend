<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\Country;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Helpers\Helper;

class CountryRepository implements CountryRepositoryInterface
{

    //Called country type repository
    public function listOfCountry():mixed
    {
       try {
        return Country::select('id','name','slug')->latest();
    } catch (Exception $e) {
        Log::error('App\Repositories\Web\Backend\V1\Dropdown\CountryTypeRepository::listOfCountryType', ['error' => $e->getMessage()]);
        throw $e;
    }
    }


     /**
     * create Country
     * @param array $credential
     * @return Country
     */
    public function createCountry(array $credential): Country
    {
        try {
            return Country::create([
                'name' => $credential['name'],
                'slug' => Helper::generateUniqueSlug($credential['name'], 'countries'),
            ]);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\CountryRepository::createCountry', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
