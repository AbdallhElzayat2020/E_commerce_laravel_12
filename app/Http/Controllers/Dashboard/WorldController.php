<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\WorldService;
use Illuminate\Http\Request;

class WorldController extends Controller
{

    protected WorldService $worldService;

    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public function index()
    {
        $countries = $this->worldService->getAllCountries();
        return view('dashboard.world.countries', compact('countries'));
    }

    public function getAllGovernorateByCountry($id)
    {
        $governorates = $this->worldService->getAllGovernorate($id);
        return view('dashboard.world.governorate', compact('governorates'));
    }

    public function getAllCitiesByGovernorate($id)
    {
        $cities = $this->worldService->getAllCities($id);
        return view('dashboard.world.cities', compact('cities'));
    }

    public function changeStatus($country_id)
    {
        $country = $this->worldService->changeStatus($country_id);
        if (!$country) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        return redirect()->back()->with('success', __('messages.success'));
    }
}
