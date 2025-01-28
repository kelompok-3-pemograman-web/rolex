<?php
include('../config/db.php');
include('../includes/featured-products.php');
include('../includes/news.php');

global $conn;

$slug = $_GET['v'];

$news = getNewsBySlug($conn, $slug);
if ($news === false) {
    die('News not found');
}

$featuredProducts = get3LatestFeaturedProducts($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex News - <?= $news['title'] ?></title>

    <meta name="description" content="<?= $news['content'] ?>">
    <meta name="keywords" content="rolex, watches, luxury, news, <?= $news['title'] ?>">
    <meta name="author" content="Rolex">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1f1f1f] text-white">

<!-- Logo -->
<nav class="bg-transparent py-10 px-[10vw]">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2 p-4">
            <img src="assets/main-logo.svg" alt="Logo" class="w-8 h-8">
            <a href="/" class="text-xl font-bold">ROLEX</a>
        </div>
    </div>
</nav>

<!-- Detail News -->
<main class="py-16 px-8">
    <div class="container mx-auto max-w-4xl">
        <div class="mb-8">
            <img src="<?= $news['image_url'] ?>" alt="News Image" class="w-full h-72 object-cover rounded-lg shadow-lg">
        </div>

        <h1 class="text-4xl font-semibold mb-4"><?= $news['title'] ?></h1>

        <p class="text-sm text-gray-400 mb-6">Diterbitkan pada: <span
                    id="created-at"><?= (new DateTime($news['created_at']))->format('Y-m-d') ?></span></p>

        <div class="prose prose-invert">
            <?php
            $content = $news['content'];
            $paragraphs = explode("\n", $content);

            foreach ($paragraphs as $paragraph) {
                echo "<p>" . nl2br(trim($paragraph)) . "</p>";
            }
            ?>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="pt-20 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
            <div>
                <h2 class="text-lg font-semibold mb-4">About Us</h2>
                <p>123 Luxury St, Geneva, Switzerland</p>
                <p>+41 123 456 789</p>
                <p>contact@rolex.com</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Quick Links</h2>
                <ul>
                    <li><a href="#about" class="hover:underline">About Us</a></li>
                    <li><a href="#featured" class="hover:underline">Products</a></li>
                    <li><a href="#news" class="hover:underline">News</a></li>
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Product</h2>
                <ul>
                    <?php foreach ($featuredProducts as $product): ?>
                        <li><a href="products?id=<?= $product['id'] ?>"
                               class="hover:underline"><?= $product['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Social</h2>
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="#" class="hover:text-gray-400"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-gray-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-gray-400"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-4 text-center">
            <p>© 2025 Rolex. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>

</html>
