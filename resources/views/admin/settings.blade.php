@extends('layouts.admin')

@section('title', 'Settings')
@section('content')

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    @php
        $settingsFlat = [];
        if (isset($allSettings)) {
            foreach ($allSettings as $group) {
                foreach ($group as $setting) {
                    $settingsFlat[$setting->key] = $setting->value;
                }
            }
        }
    @endphp

    <div class="space-y-6">
        <!-- General Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-cog mr-2"></i> General Settings</h2>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                class="p-4 sm:p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Site Name</label>
                        <input type="text" name="site_name" value="{{ $settingsFlat['site_name'] ?? 'Oriefi Clean' }}"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Site Logo</label>
                        <input type="file" name="site_logo" accept="image/svg+xml,image/png,image/jpeg"
                            class="w-full border rounded-lg px-3 py-2">
                        @if(isset($settingsFlat['site_logo']) && $settingsFlat['site_logo'])
                            <div class="mt-2">
                                <img src="{{ asset($settingsFlat['site_logo']) }}" class="h-12 w-auto rounded">
                                <p class="text-xs text-gray-500 mt-1">Current: {{ basename($settingsFlat['site_logo']) }}</p>
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Favicon</label>
                        <input type="file" name="site_favicon" accept="image/svg+xml,image/png,image/x-icon"
                            class="w-full border rounded-lg px-3 py-2">
                        @if(isset($settingsFlat['site_favicon']) && $settingsFlat['site_favicon'])
                            <div class="mt-2">
                                <img src="{{ asset($settingsFlat['site_favicon']) }}" class="h-8 w-auto rounded">
                                <p class="text-xs text-gray-500 mt-1">Current: {{ basename($settingsFlat['site_favicon']) }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save
                        Changes</button>
                </div>
            </form>
        </div>

        <!-- Contact Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-phone mr-2"></i> Contact Information</h2>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" class="p-4 sm:p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Phone Number</label><input type="text"
                            name="contact_phone" value="{{ $settingsFlat['contact_phone'] ?? '+234 803 206 8718' }}"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">Email</label><input type="email" name="contact_email"
                            value="{{ $settingsFlat['contact_email'] ?? 'info@orieflsclean.com' }}"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">WhatsApp Number</label><input type="text"
                            name="whatsapp_number" value="{{ $settingsFlat['whatsapp_number'] ?? '2348032068718' }}"
                            class="w-full border rounded-lg px-3 py-2"></div>
                </div>
                <div class="mt-4"><button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Changes</button></div>
            </form>
        </div>

        <!-- Hero Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-image mr-2"></i> Hero Section</h2>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" class="p-4 sm:p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Hero Title</label><input type="text"
                            name="hero_title" value="{{ $settingsFlat['hero_title'] ?? 'Professional Cleaning Services' }}"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">Hero Subtitle</label><textarea name="hero_subtitle"
                            class="w-full border rounded-lg px-3 py-2">{{ $settingsFlat['hero_subtitle'] ?? 'Industrial-grade equipment for spotless results' }}</textarea>
                    </div>
                </div>
                <div class="mt-4"><button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Changes</button></div>
            </form>
        </div>

        <!-- Services Management -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div
                class="px-4 sm:px-6 py-4 border-b bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-broom mr-2"></i> Manage Services</h2>
                <button onclick="showAddServiceModal()" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm">+ Add
                    Service</button>
            </div>

            <!-- Desktop: Table view (visible on md and up) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Name</th>
                            <th class="p-3 text-left">Description</th>
                            <th class="p-3 text-left">Image</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr class="border-t">
                                <td class="p-3">{{ $service->id }}</td>
                                <td class="p-3"><input type="text" class="border rounded px-2 py-1 w-32"
                                        value="{{ $service->name }}" id="name_{{ $service->id }}"></td>
                                <td class="p-3"><input type="text" class="border rounded px-2 py-1 w-48"
                                        value="{{ $service->description }}" id="desc_{{ $service->id }}"></td>
                                <td class="p-3">
                                    @if($service->image)
                                        <img src="{{ asset($service->image) }}" class="h-10 w-10 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-xs">Add image</span>
                                    @endif
                                    <button onclick="updateServiceImage({{ $service->id }})"
                                        class="bg-gray-500 text-white px-2 py-1 rounded text-xs mt-1 block">Change</button>

                                <td class="p-3">
                                    <div class="flex flex-col gap-2">
                                        <button onclick="updateService({{ $service->id }})"
                                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Save</button>
                                        <button onclick="deleteService({{ $service->id }})"
                                            class="bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile: Card view (visible on mobile only) -->
            <div class="md:hidden p-4 space-y-4">
                @foreach($services as $service)
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="text-xs text-gray-500">ID: {{ $service->id }}</span>
                                <h3 class="font-semibold text-gray-800 mt-1">{{ $service->name }}</h3>
                            </div>
                            @if($service->image)
                                <img src="{{ asset($service->image) }}" class="h-12 w-12 object-cover rounded">
                            @else
                                <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="text-xs text-gray-500 block mb-1">Description</label>
                            <input type="text" class="border rounded px-2 py-1 w-full text-sm"
                                value="{{ $service->description }}" id="desc_mobile_{{ $service->id }}">
                        </div>

                        <div class="flex gap-2 mt-3">
                            <button onclick="updateServiceMobile({{ $service->id }})"
                                class="bg-blue-600 text-white px-3 py-1 rounded text-sm flex-1">Save</button>
                            <button onclick="deleteService({{ $service->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded text-sm flex-1">Delete</button>
                            <button onclick="updateServiceImage({{ $service->id }})"
                                class="bg-gray-500 text-white px-3 py-1 rounded text-sm flex-1">Change Image</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Video Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-video mr-2"></i> Video Settings</h2>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                class="p-4 sm:p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border rounded-lg p-4">
                        <h3 class="font-semibold mb-3">Video 1</h3>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Video URL</label><input type="text"
                                name="video_1_url"
                                value="{{ $settingsFlat['video_1_url'] ?? '/videos/cleaning_video1.mp4' }}"
                                class="w-full border rounded-lg px-3 py-2"></div>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Poster Image</label><input
                                type="file" name="video_1_poster" accept="image/jpeg,image/png"
                                class="w-full border rounded-lg px-3 py-2"></div>
                    </div>
                    <div class="border rounded-lg p-4">
                        <h3 class="font-semibold mb-3">Video 2</h3>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Video URL</label><input type="text"
                                name="video_2_url"
                                value="{{ $settingsFlat['video_2_url'] ?? '/videos/cleaning_video2.mp4' }}"
                                class="w-full border rounded-lg px-3 py-2"></div>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Poster Image</label><input
                                type="file" name="video_2_poster" accept="image/jpeg,image/png"
                                class="w-full border rounded-lg px-3 py-2"></div>
                    </div>
                </div>
                <div class="mt-4"><button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Changes</button></div>
            </form>
        </div>

        <!-- Social Links -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-share-alt mr-2"></i> Social Media Links
                </h2>
            </div>
            <form method="POST" action="{{ route('admin.settings.update') }}" class="p-4 sm:p-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Facebook</label><input type="url" name="facebook_url"
                            value="{{ $settingsFlat['facebook_url'] ?? '#' }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div><label class="block text-sm font-medium mb-1">Instagram</label><input type="url"
                            name="instagram_url" value="{{ $settingsFlat['instagram_url'] ?? '#' }}"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">YouTube</label><input type="url" name="youtube_url"
                            value="{{ $settingsFlat['youtube_url'] ?? '#' }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div><label class="block text-sm font-medium mb-1">TikTok</label><input type="url" name="tiktok_url"
                            value="{{ $settingsFlat['tiktok_url'] ?? '#' }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                </div>
                <div class="mt-4"><button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Changes</button></div>
            </form>
        </div>
    </div>

    <!-- Password Change -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-key mr-2"></i> Change Password</h2>
        </div>
        <form method="POST" action="{{ route('admin.password.update') }}" class="p-4 sm:p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Current Password</label>
                    <input type="password" name="current_password" required class="w-full border rounded-lg px-3 py-2">
                    @error('current_password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">New Password</label>
                    <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Confirm New Password</label>
                    <input type="password" name="password_confirmation" required class="w-full border rounded-lg px-3 py-2">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update
                    Password</button>
            </div>
        </form>
        <!-- Reset to Default -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-6">
            <div class="px-4 sm:px-6 py-4 border-b bg-red-50">
                <h2 class="text-lg font-semibold text-red-700"><i class="fas fa-undo-alt mr-2"></i> Reset Settings</h2>
            </div>
            <div class="p-4 sm:p-6">
                <p class="text-gray-600 mb-4 text-sm">Reset all settings to their default values. This will undo any changes
                    you've made to site name, logo, favicon, hero section, videos, and social links. Your password will NOT
                    be changed.</p>
                <form method="POST" action="{{ route('admin.settings.reset') }}"
                    onsubmit="return confirm('WARNING: This will reset ALL settings to default values. This cannot be undone. Continue?');">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        <i class="fas fa-undo-alt mr-2"></i> Reset to Default
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div id="addServiceModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-11/12 max-w-md mx-4">
            <h3 class="text-lg font-bold mb-4">Add New Service</h3>
            <form method="POST" action="{{ route('admin.service.create') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Service Name" class="w-full border rounded-lg px-3 py-2 mb-3"
                    required>
                <textarea name="description" placeholder="Description" class="w-full border rounded-lg px-3 py-2 mb-3"
                    required></textarea>
                <input type="file" name="image" accept="image/*" class="w-full mb-3">
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Add</button>
                    <button type="button" onclick="closeAddServiceModal()"
                        class="bg-gray-300 px-4 py-2 rounded-lg">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showAddServiceModal() { document.getElementById('addServiceModal').style.display = 'flex'; }
        function closeAddServiceModal() { document.getElementById('addServiceModal').style.display = 'none'; }
        function updateService(id) {
            let name = document.getElementById('name_' + id).value;
            let desc = document.getElementById('desc_' + id).value;
            fetch("{{ url('/admin/services') }}/" + id, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-HTTP-Method-Override': 'PUT' },
                body: JSON.stringify({ name: name, description: desc })
            }).then(() => location.reload());
        }
        function deleteService(id) {
            if (confirm('Delete this service?')) {
                fetch("{{ url('/admin/services') }}/" + id, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                }).then(() => location.reload());
            }
        }
        function updateServiceImage(id) {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/jpeg,image/png,image/jpg,image/webp';
            fileInput.onchange = function (e) {
                const file = e.target.files[0];
                if (!file) return;
                const formData = new FormData();
                formData.append('image', file);
                formData.append('_token', '{{ csrf_token() }}');
                fetch("{{ url('/admin/services') }}/" + id + "/image", {
                    method: 'POST',
                    body: formData
                }).then(response => response.json()).then(data => {
                    if (data.success) location.reload();
                    else alert('Failed to upload image');
                });
            };
            fileInput.click();
        }
        function updateServiceMobile(id) {
            let desc = document.getElementById('desc_mobile_' + id).value;
            let name = document.getElementById('name_' + id).value;
            fetch("{{ url('/admin/services') }}/" + id, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-HTTP-Method-Override': 'PUT' },
                body: JSON.stringify({ name: name, description: desc })
            }).then(() => location.reload());
        }
    </script>
@endsection