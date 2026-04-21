<?php

namespace App\Http\Controllers;

use App\Models\Service;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }
}
