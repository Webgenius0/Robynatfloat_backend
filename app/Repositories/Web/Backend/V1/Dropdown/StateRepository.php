<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Helpers\Helper;
use App\Models\Country;
use App\Models\State;
use Exception;
use Illuminate\Support\Facades\Log;

class StateRepository implements StateRepositoryInterface
{
    // Your Repository logic goes here

    public function listOfState(): mixed
    {
        try {
            return State::query();
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\StateRepository::listOfState', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function storeState(array $credentials):State{
        try {
            return State::create([
                'name' => $credentials['name'],
                'country_id' => $credentials['country_id'],
                'slug' => Helper::generateUniqueSlug($credentials['name'], 'states', 'slug'),
            ]);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\StateRepository::storeState', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function updateState(array $credentials, State $state): State{
        try {
            $state->update([
                'name' => $credentials['name'],
                'country_id' => $credentials['country_id'],
               'slug' => Helper::generateUniqueSlug($credentials['name'], 'states', 'slug'),
            ]);
            return $state;
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\StateRepository::updateState', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function getallcountry(): mixed
    {
        try {
            return Country::all();
            dd($country);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\StateRepository::getallcountry', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
