<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;

class PublicController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('welcome', compact('services', 'settings'));
    }
}
