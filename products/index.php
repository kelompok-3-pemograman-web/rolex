<?php
include('../config/db.php');
include('../includes/featured-products.php');

global $conn;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('ID is not valid');
}

$product = getFeaturedProductById($conn, $id);
if ($product === false) {
    die('Product not found');
}

$featuredProducts = get3LatestFeaturedProducts($conn);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex - <?= $product['name'] ?></title>
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

<main class="py-16 px-8">
    <div class="container mx-auto max-w-7xl flex flex-col lg:flex-row items-center lg:items-start gap-12">
        <!-- Gambar Produk -->
        <div class="relative w-full md:w-[550px] z-[1] h-full rounded-lg bg-[#333333]">
            <div class="absolute top-8 left-[-20px] -rotate-90 bg-[#EFBE8A] text-white text-base font-bold px-5 py-[5px]">
                SALE
            </div>
            <img alt="<?= $product['name'] ?>" class="w-full h-full object-contain rounded-lg"
                 src="<?= $product['image_url'] ?>" width="130" height="215"/>
        </div>

        <!-- Konten Produk -->
        <div class="flex-1">
            <h1 class="text-4xl font-semibold mb-4 text-center lg:text-left text-white"><?= $product['name'] ?></h1>

            <p class="text-2xl text-[#EFBE8A] font-bold italic mb-6 text-center lg:text-left">
                "<?= $product['tagline'] ?>"
            </p>

            <p class="text-sm text-gray-400 mb-6 text-center lg:text-left">Diterbitkan pada: <span
                        id="created-at"><?= (new DateTime($product['created_at']))->format('Y-m-d') ?></span></p>

            <div class="prose prose-invert mb-8 text-center lg:text-left">
                <?php
                $description = $product['description'];
                $paragraphs = explode("\n", $description);

                foreach ($paragraphs as $paragraph) {
                    echo "<p>" . nl2br(trim($paragraph)) . "</p>";
                }
                ?>
            </div>
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
