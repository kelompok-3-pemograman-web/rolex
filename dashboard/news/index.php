<?php
include('../../config/auth.php');
include('../../config/db.php');
include('../../includes/news.php');

global $conn;

$news = getNews($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex Admin Dashboard - News</title>
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

    <!-- Overlay -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Main Content -->
    <div class="flex-1 p-6 lg:ml-64 transition-all">
        <!-- Hamburger Menu Button -->
        <button id="hamburger-btn" class="lg:hidden text-white p-2 mb-4 bg-[#232323] rounded-md">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Breadcrumbs -->
        <nav class="mb-2">
            <ol class="flex flex-wrap items-center gap-1.5 break-words text-sm text-[#A1A1AA] sm:gap-2.5">
                <li class="inline-flex items-center gap-1.5">
                    <a class="transition-colors hover:text-[#C9C9C9]" href="/dashboard">Home</a>
                </li>
                <li role="presentation" aria-hidden="true" class="[&>svg]:w-3.5 [&>svg]:h-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center gap-1.5">
                    <span class="font-normal text-[#C9C9C9]">News</span>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-semibold mb-6">News</h1>

        <!-- Create Button -->
        <a href="/dashboard/news/create"
           class="p-2 bg-[#C69C6D] text-white rounded-md hover:bg-[#E0B97D] transition-colors duration-300 mb-6 inline-block">
            Create
        </a>

        <!-- News Table -->
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="[&_tr]:border-b">
                <tr class="border-b transition-colors hover:bg-[#333333]/50 data-[state=selected]:bg-[#333333] border-[#333333]">
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] w-[50px]">
                        #
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] hidden sm:table-cell w-[150px]">
                        Thumbnail
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA]">Title</th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] hidden sm:table-cell">Slug
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] hidden xl:table-cell">
                        Content
                    </th>
                    <th class="h-10 px-2 text-left align-middle font-medium text-[#A1A1AA] w-[200px]">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="[&_tr:last-child]:border-0">
                <?php $i = 1; ?>
                <?php foreach ($news as $newsItem): ?>
                    <tr class="border-b transition-colors hover:bg-[#333333]/50 data-[state=selected]:bg-[#333333] border-[#333333]">
                        <td class="p-2 align-middle">
                            <?= $i ?>
                        </td>
                        <td class="p-2 align-middle hidden sm:table-cell">
                            <img src="<?= $newsItem['image_url'] ?>" alt="<?= $newsItem['title'] ?>"
                                 class="w-full h-auto object-cover">
                        </td>
                        <td class="p-2 align-middle [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                            <?= $newsItem['title'] ?>
                        </td>
                        <td class="p-2 align-middle hidden sm:table-cell [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                            <?= $newsItem['slug'] ?>
                        </td>
                        <td class="p-2 align-middle hidden xl:table-cell [&:has([role=checkbox])]:pr-0 [&>[role=checkbox]]:translate-y-[2px]">
                            <?= $newsItem['content'] ?>
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
                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const mainContent = document.querySelector('div.flex-1');

    const toggleSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
        overlay.classList.toggle('hidden');
    };

    hamburgerBtn.addEventListener('click', () => {
        toggleSidebar();
    });

    overlay.addEventListener('click', () => {
        if (sidebar.classList.contains('translate-x-0')) {
            toggleSidebar();
        }
    });
</script>
</body>

</html>
