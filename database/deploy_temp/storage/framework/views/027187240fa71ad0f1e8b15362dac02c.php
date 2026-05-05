<?php $__env->startSection('title', 'Settings'); ?>
<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php
        $settingsFlat = [];
        if (isset($allSettings)) {
            foreach ($allSettings as $group) {
                foreach ($group as $setting) {
                    $settingsFlat[$setting->key] = $setting->value;
                }
            }
        }
    ?>

    <div class="space-y-6">
        <!-- General Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-cog mr-2"></i> General Settings</h2>
            </div>
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" enctype="multipart/form-data"
                class="p-4 sm:p-6">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Site Name</label>
                        <input type="text" name="site_name" value="<?php echo e($settingsFlat['site_name'] ?? 'Oriefi Clean'); ?>"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Site Logo</label>
                        <input type="file" name="site_logo" accept="image/svg+xml,image/png,image/jpeg"
                            class="w-full border rounded-lg px-3 py-2">
                        <?php if(isset($settingsFlat['site_logo']) && $settingsFlat['site_logo']): ?>
                            <div class="mt-2">
                                <img src="<?php echo e(asset($settingsFlat['site_logo'])); ?>" class="h-12 w-auto rounded">
                                <p class="text-xs text-gray-500 mt-1">Current: <?php echo e(basename($settingsFlat['site_logo'])); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Favicon</label>
                        <input type="file" name="site_favicon" accept="image/svg+xml,image/png,image/x-icon"
                            class="w-full border rounded-lg px-3 py-2">
                        <?php if(isset($settingsFlat['site_favicon']) && $settingsFlat['site_favicon']): ?>
                            <div class="mt-2">
                                <img src="<?php echo e(asset($settingsFlat['site_favicon'])); ?>" class="h-8 w-auto rounded">
                                <p class="text-xs text-gray-500 mt-1">Current: <?php echo e(basename($settingsFlat['site_favicon'])); ?></p>
                            </div>
                        <?php endif; ?>
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
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="p-4 sm:p-6">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Phone Number</label><input type="text"
                            name="contact_phone" value="<?php echo e($settingsFlat['contact_phone'] ?? '+234 803 206 8718'); ?>"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">Email</label><input type="email" name="contact_email"
                            value="<?php echo e($settingsFlat['contact_email'] ?? 'info@orieflsclean.com'); ?>"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">WhatsApp Number</label><input type="text"
                            name="whatsapp_number" value="<?php echo e($settingsFlat['whatsapp_number'] ?? '2348032068718'); ?>"
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
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="p-4 sm:p-6">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Hero Title</label><input type="text"
                            name="hero_title" value="<?php echo e($settingsFlat['hero_title'] ?? 'Professional Cleaning Services'); ?>"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">Hero Subtitle</label><textarea name="hero_subtitle"
                            class="w-full border rounded-lg px-3 py-2"><?php echo e($settingsFlat['hero_subtitle'] ?? 'Industrial-grade equipment for spotless results'); ?></textarea>
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
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-t">
                                <td class="p-3"><?php echo e($service->id); ?></td>
                                <td class="p-3"><input type="text" class="border rounded px-2 py-1 w-32"
                                        value="<?php echo e($service->name); ?>" id="name_<?php echo e($service->id); ?>"></td>
                                <td class="p-3"><input type="text" class="border rounded px-2 py-1 w-48"
                                        value="<?php echo e($service->description); ?>" id="desc_<?php echo e($service->id); ?>"></td>
                                <td class="p-3">
                                    <?php if($service->image): ?>
                                        <img src="<?php echo e(asset($service->image)); ?>" class="h-10 w-10 object-cover rounded">
                                    <?php else: ?>
                                        <span class="text-gray-400 text-xs">Add image</span>
                                    <?php endif; ?>
                                    <button onclick="updateServiceImage(<?php echo e($service->id); ?>)"
                                        class="bg-gray-500 text-white px-2 py-1 rounded text-xs mt-1 block">Change</button>

                                <td class="p-3">
                                    <div class="flex flex-col gap-2">
                                        <button onclick="updateService(<?php echo e($service->id); ?>)"
                                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Save</button>
                                        <button onclick="deleteService(<?php echo e($service->id); ?>)"
                                            class="bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Mobile: Card view (visible on mobile only) -->
            <div class="md:hidden p-4 space-y-4">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="text-xs text-gray-500">ID: <?php echo e($service->id); ?></span>
                                <h3 class="font-semibold text-gray-800 mt-1"><?php echo e($service->name); ?></h3>
                            </div>
                            <?php if($service->image): ?>
                                <img src="<?php echo e(asset($service->image)); ?>" class="h-12 w-12 object-cover rounded">
                            <?php else: ?>
                                <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="text-xs text-gray-500 block mb-1">Description</label>
                            <input type="text" class="border rounded px-2 py-1 w-full text-sm"
                                value="<?php echo e($service->description); ?>" id="desc_mobile_<?php echo e($service->id); ?>">
                        </div>

                        <div class="flex gap-2 mt-3">
                            <button onclick="updateServiceMobile(<?php echo e($service->id); ?>)"
                                class="bg-blue-600 text-white px-3 py-1 rounded text-sm flex-1">Save</button>
                            <button onclick="deleteService(<?php echo e($service->id); ?>)"
                                class="bg-red-600 text-white px-3 py-1 rounded text-sm flex-1">Delete</button>
                            <button onclick="updateServiceImage(<?php echo e($service->id); ?>)"
                                class="bg-gray-500 text-white px-3 py-1 rounded text-sm flex-1">Change Image</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Video Settings -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800"><i class="fas fa-video mr-2"></i> Video Settings</h2>
            </div>
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" enctype="multipart/form-data"
                class="p-4 sm:p-6">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border rounded-lg p-4">
                        <h3 class="font-semibold mb-3">Video 1</h3>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Video URL</label><input type="text"
                                name="video_1_url"
                                value="<?php echo e($settingsFlat['video_1_url'] ?? '/videos/cleaning_video1.mp4'); ?>"
                                class="w-full border rounded-lg px-3 py-2"></div>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Poster Image</label><input
                                type="file" name="video_1_poster" accept="image/jpeg,image/png"
                                class="w-full border rounded-lg px-3 py-2"></div>
                    </div>
                    <div class="border rounded-lg p-4">
                        <h3 class="font-semibold mb-3">Video 2</h3>
                        <div class="mb-3"><label class="block text-sm font-medium mb-1">Video URL</label><input type="text"
                                name="video_2_url"
                                value="<?php echo e($settingsFlat['video_2_url'] ?? '/videos/cleaning_video2.mp4'); ?>"
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
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="p-4 sm:p-6">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Facebook</label><input type="url" name="facebook_url"
                            value="<?php echo e($settingsFlat['facebook_url'] ?? '#'); ?>" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div><label class="block text-sm font-medium mb-1">Instagram</label><input type="url"
                            name="instagram_url" value="<?php echo e($settingsFlat['instagram_url'] ?? '#'); ?>"
                            class="w-full border rounded-lg px-3 py-2"></div>
                    <div><label class="block text-sm font-medium mb-1">YouTube</label><input type="url" name="youtube_url"
                            value="<?php echo e($settingsFlat['youtube_url'] ?? '#'); ?>" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div><label class="block text-sm font-medium mb-1">TikTok</label><input type="url" name="tiktok_url"
                            value="<?php echo e($settingsFlat['tiktok_url'] ?? '#'); ?>" class="w-full border rounded-lg px-3 py-2">
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
        <form method="POST" action="<?php echo e(route('admin.password.update')); ?>" class="p-4 sm:p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Current Password</label>
                    <input type="password" name="current_password" required class="w-full border rounded-lg px-3 py-2">
                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">New Password</label>
                    <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <form method="POST" action="<?php echo e(route('admin.settings.reset')); ?>"
                    onsubmit="return confirm('WARNING: This will reset ALL settings to default values. This cannot be undone. Continue?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
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
            <form method="POST" action="<?php echo e(route('admin.service.create')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
            fetch("<?php echo e(url('/admin/services')); ?>/" + id, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'X-HTTP-Method-Override': 'PUT' },
                body: JSON.stringify({ name: name, description: desc })
            }).then(() => location.reload());
        }
        function deleteService(id) {
            if (confirm('Delete this service?')) {
                fetch("<?php echo e(url('/admin/services')); ?>/" + id, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' }
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
                formData.append('_token', '<?php echo e(csrf_token()); ?>');
                fetch("<?php echo e(url('/admin/services')); ?>/" + id + "/image", {
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
            fetch("<?php echo e(url('/admin/services')); ?>/" + id, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'X-HTTP-Method-Override': 'PUT' },
                body: JSON.stringify({ name: name, description: desc })
            }).then(() => location.reload());
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/admin/settings.blade.php ENDPATH**/ ?>