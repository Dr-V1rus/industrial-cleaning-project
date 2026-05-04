<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $allSettings = Setting::all()->groupBy('group');
        $services = Service::all();
        return view('admin.settings', compact('allSettings', 'services'));
    }

    public function update(Request $request)
    {
        $excluded = ['_token', 'site_logo', 'site_favicon', 'video_1_poster', 'video_2_poster'];
        
        foreach ($request->except($excluded) as $key => $value) {
            if ($value !== null && !$value instanceof \Illuminate\Http\UploadedFile) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value, 'type' => 'text', 'group' => 'general']
                );
            }
        }
        
        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->store('images', 'public');
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => '/storage/' . $path, 'type' => 'image', 'group' => 'general']
            );
        }
        
        if ($request->hasFile('site_favicon')) {
            $path = $request->file('site_favicon')->store('images', 'public');
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => '/storage/' . $path, 'type' => 'image', 'group' => 'general']
            );
        }
        
        if ($request->hasFile('video_1_poster')) {
            $path = $request->file('video_1_poster')->store('images', 'public');
            Setting::updateOrCreate(
                ['key' => 'video_1_poster'],
                ['value' => '/storage/' . $path, 'type' => 'image', 'group' => 'videos']
            );
        }
        
        if ($request->hasFile('video_2_poster')) {
            $path = $request->file('video_2_poster')->store('images', 'public');
            Setting::updateOrCreate(
                ['key' => 'video_2_poster'],
                ['value' => '/storage/' . $path, 'type' => 'image', 'group' => 'videos']
            );
        }
        
        return back()->with('success', 'Settings saved successfully!');
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
        return response()->json(['success' => true]);
    }

    public function updateServiceImage(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $service->image = '/storage/' . $path;
            $service->save();
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false, 'error' => 'No image uploaded']);
    }

    public function createService(Request $request)
    {
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $service->image = '/storage/' . $path;
            $service->save();
        }

        return back()->with('success', 'Service added!');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success' => true]);
    }

    public function uploadMedia(Request $request)
    {
        $request->validate(['file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4|max:20480']);
        $path = $request->file('file')->store('media', 'public');
        return response()->json(['location' => '/storage/' . $path]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }

    public function resetToDefault()
{
    // Default settings values (based on current database state)
    $defaults = [
        'site_name' => 'Oriefi\'s Cleaning Services',
        'site_logo' => '/logo.svg',
        'site_favicon' => '/favicon.svg',
        'contact_phone' => '+234 803 206 8718',
        'contact_email' => 'info@orieflsclean.com',
        'whatsapp_number' => '2348032068718',
        'hero_title' => 'Professional Cleaning Services',
        'hero_subtitle' => 'Industrial-grade equipment for spotless results',
        'facebook_url' => 'https://www.facebook.com/profile.php?id=61575643785428&mibextid=ZbWKwL',
        'instagram_url' => 'https://www.instagram.com/oriefink?utm_source=qr&igsh=MWI1b2VmMjk1OTBpYw==',
        'youtube_url' => 'https://youtube.com/@oriefitv?si=vAQsIJKH3YcssKLa',
        'tiktok_url' => 'https://www.tiktok.com/@oriefink042?_r=1&_t=ZS-95hqvHoPpeT',
        'video_1_url' => '/videos/cleaning_video1.mp4',
        'video_2_url' => '/videos/cleaning_video2.mp4',
        'video_1_poster' => '/images/video-poster1.jpg',
        'video_2_poster' => '/images/video-poster2.jpg',
    ];

    foreach ($defaults as $key => $value) {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => 'text', 'group' => 'general']
        );
    }

    return back()->with('success', 'All settings have been reset to default values!');
}
}
