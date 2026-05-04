<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;

class PageController extends Controller
{
    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('about', compact('settings'));
    }

    public function allservices()
    {
        $services = Service::all();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('allservices', compact('services', 'settings'));
    }

    public function contact()
    {
        $services = Service::all();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('contact', compact('services', 'settings'));
    }
}
