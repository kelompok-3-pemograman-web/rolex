<?php
include('../../../config/auth.php');
include('../../../config/db.php');
include('../../../includes/news.php');

global $conn;

if (isset($_POST["submit"])) {
    $error = createNews($conn, $_POST, $_FILES['image']);
    if ($error === false) {
        header("Location: /dashboard/news");
    } else {
        header("Location: /dashboard/news/create?error=$error");
    }
    mysqli_close($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex Admin Dashboard - Create News</title>
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
                    <a class="transition-colors hover:text-[#C9C9C9]" href="/dashboard/news">News</a>
                </li>
                <li role="presentation" aria-hidden="true" class="[&>svg]:w-3.5 [&>svg]:h-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center gap-1.5">
                    <span class="font-normal text-[#C9C9C9]">Create</span>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-semibold mb-6">Create News</h1>

        <?php if (isset($_GET['error'])): ?>
            <div>
                <label class="text-sm text-[#D9534F]">Error</label>
                <div class="bg-[#C9302C] text-white p-2 rounded-md mb-4 text-center max-w-md">
                    <?= $_GET['error'] ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form Create Featured Product -->
        <form action="" method="POST" class="space-y-4 max-w-md" enctype="multipart/form-data">
            <!-- Image -->
            <div class="flex flex-col space-y-1">
                <label for="image" class="text-sm">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required
                       class="p-2 bg-[#333333] rounded-md outline-none focus:outline-[#444444]">
            </div>

            <!-- Image Preview -->
            <img id="preview" class="hidden max-w-md h-auto object-cover rounded-md" alt="Image Preview" src="">

            <!-- Title -->
            <div class="flex flex-col space-y-1">
                <label for="title" class="text-sm">Title</label>
                <input type="text" id="title" name="title" required
                       class="p-2 bg-[#333333] rounded-md outline-none focus:outline-[#444444]">
            </div>

            <!-- Slug -->
            <div class="flex flex-col space-y-1">
                <label for="slug" class="text-sm">Slug</label>
                <input type="text" id="slug" name="slug" required
                       class="p-2 bg-[#333333] rounded-md outline-none focus:outline-[#444444]">
            </div>

            <!-- Content -->
            <div class="flex flex-col space-y-1">
                <label for="content" class="text-sm">Content</label>
                <textarea id="content" name="content" required
                          class="p-2 bg-[#333333] rounded-md outline-none focus:outline-[#444444] min-h-[100px] max-h-[300px]"></textarea>
            </div>

            <!-- Submit Button -->
            <button name="submit" type="submit"
                    class="w-full p-2 bg-[#444444] text-white hover:bg-[#555555] rounded-md transition-colors duration-300 outline-none focus:outline-[#444444]">
                Create News
            </button>
        </form>
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

<script>
    document.getElementById('image').addEventListener('change', previewImage);

    function previewImage(event) {
        const file = event.target.files[0];

        if (file) {
            const fileType = file.type;

            if (!fileType.startsWith('image/')) {
                alert("Only image files are allowed.");
                event.target.value = "";
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    }
</script>

</body>

</html>
