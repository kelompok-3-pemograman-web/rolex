<?php
include('../../config/auth.php');
include('../../config/db.php');
include('../../includes/admins.php');

global $conn;

$admins = getAdmins($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex Admin Dashboard - User Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1f1f1f] text-white">
<div class="relative min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar"
         class="bg-[#232323] w-64 p-5 transform transition-all fixed inset-y-0 left-0 z-50 lg:block -translate-x-full lg:translate-x-0">
        <!-- Logo -->
        <div class="flex items-center gap-2 mb-6">
            <img src="/assets/main-logo.svg" alt="Logo" class="w-8 h-8">
            <a href="/dashboard" class="text-xl font-bold text-white">ROLEX</a>
        </div>
        <ul class="space-y-6">
            <!-- Menu Item User Management -->
            <li>
                <a href="/dashboard/user-management"
                   class="flex items-center space-x-3 p-3 hover:bg-[#333333] rounded-md transition-colors duration-300">
                    <i class="fas fa-users text-xl"></i>
                    <span class="text-lg">User Management</span>
                </a>
            </li>

            <!-- Menu Item Featured Products -->
            <li>
                <a href="/dashboard/featured-products"
                   class="flex items-center space-x-3 p-3 hover:bg-[#333333] rounded-md transition-colors duration-300">
                    <i class="fas fa-cogs text-xl"></i>
                    <span class="text-lg">Featured Products</span>
                </a>
            </li>

            <!-- Menu Item News -->
            <li>
                <a href="/dashboard/news"
                   class="flex items-center space-x-3 p-3 hover:bg-[#333333] rounded-md transition-colors duration-300">
                    <i class="fas fa-newspaper text-xl"></i>
                    <span class="text-lg">News</span>
                </a>
            </li>
        </ul>

        <!-- Logout Button -->
        <form action="/dashboard/logout.php" method="POST">
            <button class="mt-6 w-full p-3 bg-[#444444] text-white hover:bg-[#555555] rounded-md transition-colors duration-300">
                Logout
            </button>
        </form>
    </div>

    <!-- Overlay (visible when sidebar is open on mobile) -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Main Content -->
    <div class="flex-1 p-6 lg:ml-64 transition-all">
        <!-- Hamburger Menu Button (visible only on mobile) -->
        <button id="hamburger-btn" class="lg:hidden text-white p-2 mb-4 bg-[#232323] rounded-md">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <h1 class="text-3xl font-semibold mb-6">User Management</h1>

        <!-- Create Button -->
        <button class="p-2 bg-[#C69C6D] text-white rounded-md hover:bg-[#E0B97D] transition-colors duration-300 mb-6">
            Create
        </button>

        <!-- User Management Table -->
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-[#333333]/50 data-[state=selected]:bg-[#333333] border-[#333333]">
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px] w-[50px]">
                        ID
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        Username
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        Email
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px] w-[200px]">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                <?php foreach ($admins as $admin): ?>
                <tr class="border-b transition-colors hover:bg-[#333333]/50 data-[state=selected]:bg-[#333333] border-[#333333]">
                    <td class="p-2 align-middle [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        <?= $admin['id'] ?>
                    </td>
                    <td class="p-2 align-middle [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        <?= $admin['username'] ?>
                    </td>
                    <td class="p-2 align-middle [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        <?= $admin['email'] ?>
                    </td>
                    <td class="p-2 align-middle [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                        <button class="p-2 bg-[#444444] text-white rounded-md hover:bg-[#555555] transition-colors duration-300">
                            Edit
                        </button>
                        <button class="p-2 bg-[#D9534F] text-white rounded-md hover:bg-[#C9302C] transition-colors duration-300">
                            Delete
                        </button
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script untuk toggle sidebar pada mobile -->
<script>
    // Ambil elemen-elemen DOM
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const mainContent = document.querySelector('div.flex-1');

    // Fungsi untuk membuka atau menutup sidebar
    const toggleSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
        overlay.classList.toggle('hidden');
    };

    // Event listener untuk tombol hamburger
    hamburgerBtn.addEventListener('click', () => {
        toggleSidebar();
    });

    // Event listener untuk overlay
    overlay.addEventListener('click', () => {
        if (sidebar.classList.contains('translate-x-0')) {
            toggleSidebar();
        }
    });
</script>
</body>

</html>
