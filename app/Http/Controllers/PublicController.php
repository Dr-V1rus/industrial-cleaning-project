<?php

namespace App\Http\Controllers;

use App\Models\Service;

class PublicController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('welcome', compact('services'));
    }
}