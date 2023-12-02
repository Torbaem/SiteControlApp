<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensordata;

class HomePage extends Controller
{
    public function index()
    {
        $latestData = Sensordata::find(1); // Obtener datos del ID 1


        return view('content.pages.pages-home', ['latestData' => $latestData]);
    }
}
