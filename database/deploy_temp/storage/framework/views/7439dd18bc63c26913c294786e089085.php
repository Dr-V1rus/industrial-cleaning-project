<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin Dashboard - Oriefi's Cleaning</title>
    <!-- Favicon - Simple and working -->
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('favicon.svg')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .transition-sidebar {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Mobile Top Bar (visible only on mobile) -->
    <div class="md:hidden bg-white shadow-sm px-4 py-3 flex justify-between items-center sticky top-0 z-30">
        <button id="mobileMenuBtn" class="text-gray-700 text-2xl">
            <i class="fas fa-bars"></i>
        </button>
        <span class="font-semibold text-gray-800">Admin Panel</span>
        
    </div>

    <!-- Mobile Sidebar Drawer -->
    <div id="mobileSidebar"
        class="fixed top-0 left-0 w-64 h-full bg-gray-900 text-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-5 border-b border-gray-800 flex justify-between items-center">
            <span class="font-bold text-xl"><i class="fas fa-broom"></i> Oriefi's</span>
            <button id="closeSidebarBtn" class="text-gray-400 text-xl">&times;</button>
        </div>
        <nav class="mt-4">
            <a href="/admin/dashboard" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-tachometer-alt w-5"></i> Dashboard
            </a>
            <a href="/admin/bookings" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-calendar-check w-5"></i> Bookings
            </a>
            <a href="/admin/messages" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-envelope w-5"></i> Messages
            </a>
            <a href="/admin/settings" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-cog w-5"></i> Settings
            </a>
            <a href="/" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition mt-4">
                <i class="fas fa-globe w-5"></i> View Website
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="flex items-center gap-3 px-5 py-3 w-full text-left hover:bg-gray-800 transition">
                    <i class="fas fa-sign-out-alt w-5"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Overlay when sidebar is open -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

    <!-- Desktop Sidebar (collapsible) -->
    <div id="desktopSidebar" class="hidden md:block fixed left-0 top-0 h-full bg-gray-900 text-white z-20 transition-sidebar" style="width: 260px;">
        <div class="p-5 border-b border-gray-800 flex justify-between items-center">
            <span id="desktopLogo" class="font-bold text-xl"><i class="fas fa-broom"></i> Oriefi's</span>
            <button id="collapseSidebarBtn" class="text-gray-400 hover:text-white">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
        <nav class="mt-4">
            <a href="/admin/dashboard" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-tachometer-alt w-5"></i> <span class="nav-text">Dashboard</span>
            </a>
            <a href="/admin/bookings" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-calendar-check w-5"></i> <span class="nav-text">Bookings</span>
            </a>
            <a href="/admin/messages" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-envelope w-5"></i> <span class="nav-text">Messages</span>
            </a>
            <a href="/admin/settings" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition">
                <i class="fas fa-cog w-5"></i> <span class="nav-text">Settings</span>
            </a>
            <a href="/" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-800 transition mt-4">
                <i class="fas fa-globe w-5"></i> <span class="nav-text">View Website</span>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="flex items-center gap-3 px-5 py-3 w-full text-left hover:bg-gray-800 transition">
                    <i class="fas fa-sign-out-alt w-5"></i> <span class="nav-text">Logout</span>
                </button>
            </form>
        </nav>
    </div>


    <!-- Main Content -->
    <div id="mainContent" class="md:ml-[260px] transition-sidebar min-h-screen">
        <!-- Desktop Top Bar -->
        <div class="hidden md:block bg-white shadow-sm px-6 py-4">
            <h1 class="text-xl font-semibold text-gray-800"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
        </div>
        <!-- Page Content -->
        <div class="p-4 sm:p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script>
        const mobileSidebar = document.getElementById('mobileSidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            mobileSidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            mobileSidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openSidebar);
        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        // Desktop sidebar collapse/expand
        const desktopSidebar = document.getElementById('desktopSidebar');
        const mainContent = document.getElementById('mainContent');
        const collapseBtn = document.getElementById('collapseSidebarBtn');
        const desktopLogo = document.getElementById('desktopLogo');
        const navTexts = document.querySelectorAll('#desktopSidebar .nav-text');
        let isSidebarExpanded = true;

        if (collapseBtn) {
            collapseBtn.addEventListener('click', () => {
                if (isSidebarExpanded) {
                    // Collapse sidebar
                    desktopSidebar.style.width = '80px';
                    mainContent.style.marginLeft = '80px';
                    desktopLogo.classList.add('hidden');
                    navTexts.forEach(text => text.classList.add('hidden'));
                    collapseBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
                    isSidebarExpanded = false;
                } else {
                    // Expand sidebar
                    desktopSidebar.style.width = '260px';
                    mainContent.style.marginLeft = '260px';
                    desktopLogo.classList.remove('hidden');
                    navTexts.forEach(text => text.classList.remove('hidden'));
                    collapseBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
                    isSidebarExpanded = true;
                }
            });
        }
    </script>
</body>

</html><?php /**PATH C:\Users\HP\Desktop\xampp\htdocs\oriefi-cleaning\resources\views/layouts/admin.blade.php ENDPATH**/ ?>