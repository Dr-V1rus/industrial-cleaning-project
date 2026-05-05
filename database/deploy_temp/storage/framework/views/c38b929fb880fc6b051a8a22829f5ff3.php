<?php $__env->startSection('title', 'Messages'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">Contact Messages</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <table>
                    <th class="p-3 text-left text-sm font-semibold">Name</th>
                    <th class="p-3 text-left text-sm font-semibold">Email</th>
                    <th class="p-3 text-left text-sm font-semibold">Message</th>
                    <th class="p-3 text-left text-sm font-semibold">Received</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium"><?php echo e($message->name); ?></td>
                    <td class="p-3 text-sm"><?php echo e($message->email); ?></td>
                    <td class="p-3 text-sm"><?php echo e($message->message); ?></td>
                    <td class="p-3 text-sm text-gray-500"><?php echo e($message->created_at->format('M d, Y h:i A')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="p-6 text-center text-gray-500">No messages yet</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/admin/messages.blade.php ENDPATH**/ ?>