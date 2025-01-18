<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1f1f1f] text-white">
    <!-- Navbar -->
    <nav class="bg-transparent py-[2vw] px-[10vw]">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="assets/main-logo.svg" alt="Logo" class="w-8 h-8">
                <a href="#" class="text-xl font-bold">ROLEX</a>
            </div>
            <button class="lg:hidden flex items-center text-white focus:outline-none">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 6h18M3 12h18m-9 6h9"></path>
                </svg>
            </button>
            <div class="hidden lg:flex space-x-4">
                <a href="#" class="hover:text-gray-400">Home</a>
                <a href="#" class="hover:text-gray-400">Featured</a>
                <a href="#" class="hover:text-gray-400">About</a>
                <a href="#" class="hover:text-gray-400">News</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class=" py-16">
        <div class="container justify-center mx-auto flex flex-col lg:flex-row items-center gap-8">
            <div class="text-center lg:text-left max-w-[450px]">
                <h1 class="text-4xl font-bold mb-4">TIMELESS ELEGENCE SINCE 1905</h1>
                <p class="text-lg mb-6">Since 1905, Rolex has defined timeless elegance, precision, and innovation.</p>
                <a href="#" class="bg-[#BFBFBF] text-[#1f1f1f] px-6 py-3 rounded-sm hover:bg-gray-200">Explore Our Collection</a>
            </div>
            <img src="assets/contents/watch.png" alt="Watch" class="w-full lg:w-1/4">
        </div>
    </section>

    <!-- Featured Section -->
    <section class="py-16" id="featured">
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
                <div class="w-[67px] h-[1px] bg-[#EFBE8A] mb-4"></div>
                <h2 class="text-3xl font-bold text-center mb-12">Featured</h2>
            </div>
            <!-- jassmaster -->
            <div class="flex flex-col md:flex-row justify-center gap-8 mt-5">
                <div class="py-12 px-16 w-[550px] h-full rounded-lg bg-[#333333] relative">
                    <div class="absolute top-20 left-[-20px] -rotate-90 bg-[#EFBE8A] text-white text-base font-bold px-5 py-[5px]">
                        SALE
                    </div>
                    <img alt="jassmaster" class="w-full h-full object-contain" src="assets/contents/jazzmaster.png" width="130" height="215" />
                    <div class="text-center mt-4">
                        <h2 class="text-lg font-semibold">
                            JAZZMASTER
                        </h2>
                    </div>
                </div>
                <div class="mt-8 md:mt-12 md:ml-8 text-center md:text-left pr-[5vw]">
                    <h1 class="text-3xl md:text-5xl  font-bold">
                        WHERE PRECISION MEETS ELEGANCE.
                    </h1>
                    <p class="mt-4 text-gray-400">
                        Jazzmaster embodies precision and elegance in its finest form. With a classic design that seamlessly blends sophistication and accuracy, this timepiece is perfect for those who value craftsmanship and beauty in every detail. Each tick of the Jazzmaster represents a fusion of tradition and innovation in horology.
                    </p>
                    <button class="mt-6 bg-[#BFBFBF] text-black py-2 px-4 rounded hover:bg-gray-600">
                        Discover
                    </button>
                </div>
            </div>
            <!-- ingersol -->
            <div class="flex flex-col md:flex-row-reverse justify-center gap-8 mt-5">
                <div class="py-12 px-16 w-[550px] h-full rounded-lg bg-[#333333] relative">
                    <div class="absolute top-20 left-[-20px] -rotate-90 bg-[#EFBE8A] text-white text-base font-bold px-5 py-[5px]">
                        SALE
                    </div>
                    <img alt="jassmaster" class="w-full h-full object-contain" src="assets/contents/ingersoll.png" width="130" height="215" />
                    <div class="text-center mt-4">
                        <h2 class="text-lg font-semibold">
                            INGERSOLL
                        </h2>
                    </div>
                </div>
                <div class="mt-8 md:mt-12 md:ml-8 md:text-left pr-[5vw]">
                    <h1 class="text-3xl md:text-5xl text-right font-bold">
                        WHERE PRECISION MEETS ELEGANCE.
                    </h1>
                    <p class="mt-4 text-gray-400 text-right">
                        Jazzmaster embodies precision and elegance in its finest form. With a classic design that seamlessly blends sophistication and accuracy, this timepiece is perfect for those who value craftsmanship and beauty in every detail. Each tick of the Jazzmaster represents a fusion of tradition and innovation in horology.
                    </p>
                    <div class="flex justify-end">
                        <button class="mt-6 bg-[#BFBFBF] text-black py-2 px-4 rounded hover:bg-gray-600">
                            Discover
                        </button>
                    </div>
                </div>
            </div>
            <!-- rose gold -->
            <div class="flex flex-col md:flex-row justify-center gap-8 mt-5">
                <div class="py-12 px-16 w-[550px] h-full rounded-lg bg-[#333333] relative">
                    <div class="absolute top-20 left-[-20px] -rotate-90 bg-[#EFBE8A] text-white text-base font-bold px-5 py-[5px]">
                        SALE
                    </div>
                    <img alt="jassmaster" class="w-full h-full object-contain" src="assets/contents/rosegold.png" width="130" height="215" />
                    <div class="text-center mt-4">
                        <h2 class="text-lg font-semibold">
                            Rose Gold
                        </h2>
                    </div>
                </div>
                <div class="mt-8 md:mt-12 md:ml-8 text-center md:text-left pr-[5vw]">
                    <h1 class="text-3xl md:text-5xl  font-bold">
                        WHERE PRECISION MEETS ELEGANCE.
                    </h1>
                    <p class="mt-4 text-gray-400">
                        Jazzmaster embodies precision and elegance in its finest form. With a classic design that seamlessly blends sophistication and accuracy, this timepiece is perfect for those who value craftsmanship and beauty in every detail. Each tick of the Jazzmaster represents a fusion of tradition and innovation in horology.
                    </p>
                    <button class="mt-6 bg-[#BFBFBF] text-white py-2 px-4 rounded hover:bg-gray-600">
                        Discover
                    </button>
                </div>
            </div>
    </section>



    <!-- Footer -->
    <footer class=" py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Rolex. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>