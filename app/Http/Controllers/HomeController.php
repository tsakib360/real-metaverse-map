<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if($request->has('latitude') && $request->has('longitude')) {
            $data['latitude'] = $request->latitude;
            $data['longitude'] = $request->longitude;
        }else {
            $data['longitude'] = -77.032;
            $data['latitude'] = 38.913;
        }
        return view('map', $data);
    }
}
