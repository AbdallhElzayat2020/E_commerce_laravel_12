<?php

namespace App\Repositories\Dashboard;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;

class WorldRepository
{
    public function getAllCountries()
    {
        return Country::select('id', 'name', 'phone_code', 'is_active')->get();
    }

    public function getGovernorateById($id)
    {
        return Governorate::find($id);
    }

    public function getCountryById($id)
    {
        return Country::find($id);
    }

    public function getAllCities($governorate)
    {
        return $governorate->cities()->get();
    }

    public function getAllGovernorate($country)
    {
        return $country->governorates()->get();
    }

    public function changeStatus($country)
    {
        return $country->update([
            'status' => $country->status == 1 ? 0 : 1,
        ]);
    }
}
