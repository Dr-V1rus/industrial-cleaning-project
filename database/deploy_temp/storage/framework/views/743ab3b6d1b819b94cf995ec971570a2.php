<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="<?php echo e(route('admin.bookings')); ?>"
            class="block bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition cursor-pointer">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Bookings</p>
                    <h2 class="text-3xl font-bold"><?php echo e($totalBookings ?? 0); ?></h2>
                </div>
                <i class="fas fa-calendar-alt text-4xl text-blue-500 opacity-50"></i>
            </div>
        </a>

        <a href="<?php echo e(route('admin.bookings')); ?>?status=pending"
            class="block bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition cursor-pointer">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Pending</p>
                    <h2 class="text-3xl font-bold text-yellow-600"><?php echo e($pendingBookings ?? 0); ?></h2>
                </div>
                <i class="fas fa-clock text-4xl text-yellow-500 opacity-50"></i>
            </div>
        </a>

        <a href="<?php echo e(route('admin.bookings')); ?>?status=completed"
            class="block bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition cursor-pointer">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Completed</p>
                    <h2 class="text-3xl font-bold text-green-600"><?php echo e($completedBookings ?? 0); ?></h2>
                </div>
                <i class="fas fa-check-circle text-4xl text-green-500 opacity-50"></i>
            </div>
        </a>

        <a href="<?php echo e(route('admin.messages')); ?>"
            class="block bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 hover:shadow-md transition cursor-pointer">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Messages</p>
                    <h2 class="text-3xl font-bold text-purple-600"><?php echo e($messages ?? 0); ?></h2>
                </div>
                <i class="fas fa-envelope text-4xl text-purple-500 opacity-50"></i>
            </div>
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Recent Bookings</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold">Client</th>
                        <th class="p-3 text-left text-sm font-semibold">Service</th>
                        <th class="p-3 text-left text-sm font-semibold">Date</th>
                        <th class="p-3 text-left text-sm font-semibold">Status</th>
                        <th class="p-3 text-left text-sm font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $bookings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-t hover:bg-gray-50">
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
                                    <select name="status" onchange="this.form.submit()"
                                        class="border rounded-lg px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="pending" <?php if($booking->status == 'pending'): echo 'selected'; endif; ?>>Pending</option>
                                        <option value="confirmed" <?php if($booking->status == 'confirmed'): echo 'selected'; endif; ?>>Confirmed</option>
                                        <option value="in_progress" <?php if($booking->status == 'in_progress'): echo 'selected'; endif; ?>>In Progress
                                        </option>
                                        <option value="completed" <?php if($booking->status == 'completed'): echo 'selected'; endif; ?>>Completed</option>
                                        <option value="cancelled" <?php if($booking->status == 'cancelled'): echo 'selected'; endif; ?>>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">No bookings yet</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>