<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-8">
        <div>
            <div class="w-58 mb-4">
                <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
            </div>
            <p class="text-gray-400">Professional cleaning services with industrial-grade equipment for spotless results.</p>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="<?php echo e(url('/')); ?>" class="hover:text-white transition">Home</a></li>
                <li><a href="<?php echo e(url('/about')); ?>" class="hover:text-white transition">About Us</a></li>
                <li><a href="<?php echo e(url('/allservices')); ?>" class="hover:text-white transition">Services</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>" class="hover:text-white transition">Contact</a></li>
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(url('/admin/dashboard')); ?>" class="hover:text-white transition">Dashboard</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Contact Info</h4>
            <ul class="space-y-2 text-gray-400">
                <li><i class="fas fa-phone mr-2"></i> <?php echo e($settings['contact_phone'] ?? '+234 803 206 8718'); ?></li>
                <li><i class="fab fa-whatsapp mr-2"></i> WhatsApp: <?php echo e($settings['contact_phone'] ?? '+234 803 206 8718'); ?></li>
                <li><i class="fas fa-envelope mr-2"></i> <?php echo e($settings['contact_email'] ?? 'info@orieflsclean.com'); ?></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-lg mb-4">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="<?php echo e($settings['facebook_url'] ?? '#'); ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo e($settings['youtube_url'] ?? '#'); ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition"><i class="fab fa-youtube"></i></a>
                <a href="<?php echo e($settings['instagram_url'] ?? '#'); ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo e($settings['tiktok_url'] ?? '#'); ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gray-600 transition"><i class="fab fa-tiktok"></i></a>
                <a href="https://wa.me/<?php echo e($settings['whatsapp_number'] ?? '2348032068718'); ?>" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($settings['site_name'] ?? 'Oriefi\'s Cleaning Services'); ?>. All rights reserved.</p>
    </div>
</footer>
<?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/components/footer.blade.php ENDPATH**/ ?>