<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\WorldRepository;

class WorldService
{

    protected WorldRepository $worldRepository;

    public function __construct(WorldRepository $worldRepository)
    {
        $this->worldRepository = $worldRepository;
    }

    public function getCountryById($id)
    {
        $country = $this->worldRepository->getCountryById($id);
        if (!$country) {
            abort(404, 'Country not found');
        }
        return $country;
    }

    public function getGovernorateById($id)
    {
        $governorate = $this->worldRepository->getGovernorateById($id);
        if (!$governorate) {
            abort(404, 'Governorate not found');
        }
        return $governorate;
    }

    public function getAllCountries()
    {
        return $this->worldRepository->getAllCountries();
    }


    public function getAllGovernorate($id)
    {
        $country = $this->getCountryById($id);
        return $this->worldRepository->getAllGovernorate($country);
    }

    public function getAllCities($governorate_id)
    {
        $governorate = $this->getGovernorateById($governorate_id);
        return $this->worldRepository->getAllCities($governorate);
    }

    public function changeStatus($country_id)
    {
        $country = $this->getCountryById($country_id);
        return $this->worldRepository->changeStatus($country);
    }
}
