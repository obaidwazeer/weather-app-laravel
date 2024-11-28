<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class WeatherController extends Controller
{
    public function index(Request $request){
        // dd("https://open-weather13.p.rapidapi.com/city/london/%7Blang%7D");
        // $url = Http::get("https://open-weather13.p.rapidapi.com/city/london/%7Blang%7D");
        // dd($url);
        $weatherData = [];
        if($request->isMethod('POST')){
            $city = $request->city;
            $response = Http::withHeaders([
                "x-rapidapi-host" => "open-weather13.p.rapidapi.com",
                "x-rapidapi-key" => "47f61005f9mshffa680fc6ce66efp19229fjsned5a10607e5f",
            ])->get("https://open-weather13.p.rapidapi.com/city/{$city}/%7Blang%7D");
            // echo '<pre>';
            $weatherData = $response->json();

        }
        return view('weather',['data' => $weatherData]);
    }
}
