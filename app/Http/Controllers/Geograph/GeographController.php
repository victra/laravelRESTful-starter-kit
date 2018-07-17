<?php

namespace App\Http\Controllers\Geograph;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\City;
use App\Models\District;

use Illuminate\Http\Request;

class GeographController extends Controller
{
    public function getProvince()
    {
        $province = Province::get();
        return response()->json($province);
    }

    public function getCity(Request $request)
    {
        $this->validate($request, [
            'province_id' => 'required|exists:App\Entities\Province,id',
        ]);

        $province = Province::find($request->input('province_id'));
        $city = City::where('province_id', $request->input('province_id'))->get();

        return response()->json($city);
    }

    public function getDistrict(Request $request)
    {
        $this->validate($request, [
            'city_id' => 'required|exists:App\Entities\City,id',
        ]);

        $city = City::find($request->input('city_id'));
        $district = District::where('city_id', $request->input('city_id'))->get();
        
        return response()->json($district);
    }
}