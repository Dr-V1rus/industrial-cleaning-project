<?php $__env->startSection('title', 'All Bookings'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-800">All Bookings</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left text-sm font-semibold">ID</th>
                    <th class="p-3 text-left text-sm font-semibold">Client</th>
                    <th class="p-3 text-left text-sm font-semibold">Service</th>
                    <th class="p-3 text-left text-sm font-semibold">Date</th>
                    <th class="p-3 text-left text-sm font-semibold">Status</th>
                    <th class="p-3 text-left text-sm font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 text-sm"><?php echo e($booking->id); ?></td>
                    <td class="p-3">
                        <div class="font-medium"><?php echo e($booking->name); ?></div>
                        <div class="text-xs text-gray-500"><?php echo e($booking->phone); ?></div>
                    </td>
                    <td class="p-3 text-sm"><?php echo e($booking->service->name ?? 'N/A'); ?></td>
                    <td class="p-3 text-sm"><?php echo e($booking->preferred_date); ?></td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                            <?php if($booking->status == 'pending'): ?> bg-yellow-100 text-yellow-800
                            <?php elseif($booking->status == 'confirmed'): ?> bg-blue-100 text-blue-800
                            <?php elseif($booking->status == 'completed'): ?> bg-green-100 text-green-800
                            <?php elseif($booking->status == 'in_progress'): ?> bg-purple-100 text-purple-800
                            <?php else: ?> bg-gray-100
                            <?php endif; ?>">
                            <?php echo e(ucfirst($booking->status)); ?>

                        </span>
                    </td>
                    <td class="p-3">
                        <form method="POST" action="<?php echo e(route('admin.booking.status', $booking->id)); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <select name="status" onchange="this.form.submit()" class="border rounded-lg px-2 py-1 text-sm">
                                <option value="pending" <?php if($booking->status == 'pending'): echo 'selected'; endif; ?>>Pending</option>
                                <option value="confirmed" <?php if($booking->status == 'confirmed'): echo 'selected'; endif; ?>>Confirmed</option>
                                <option value="in_progress" <?php if($booking->status == 'in_progress'): echo 'selected'; endif; ?>>In Progress</option>
                                <option value="completed" <?php if($booking->status == 'completed'): echo 'selected'; endif; ?>>Completed</option>
                                <option value="cancelled" <?php if($booking->status == 'cancelled'): echo 'selected'; endif; ?>>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">No bookings yet</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t">
        <?php echo e($bookings->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/admin/bookings.blade.php ENDPATH**/ ?>