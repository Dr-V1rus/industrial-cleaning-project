<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;

class PublicController extends Controller
{
    public function index()
    {
        $seoTitle = 'Oriefi\'s Cleaning Services - Professional Cleaning in Nigeria';
    $seoDescription = 'Professional cleaning services with industrial-grade equipment. Residential, commercial, post-construction cleaning. Free WhatsApp quotes.';
    $seoKeywords = 'cleaning services, professional cleaning, residential cleaning, commercial cleaning, pressure washing';
        $services = Service::all();
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('welcome', compact('services', 'settings'));
    }
}
