<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolex</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1f1f1f] text-white">
    <!-- Navbar -->
    <nav class="bg-transparent py-10 px-[10vw]">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="assets/main-logo.svg" alt="Logo" class="w-8 h-8">
                <a href="#home" class="text-xl font-bold">ROLEX</a>
            </div>

            <!-- Hamburger Menu Button -->
            <button id="menu-btn" class="md:hidden flex items-center text-white focus:outline-none">
                <svg fill="#FFFFFF" class="w-6 h-6" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M26,16c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,14,26,14.896,26,16z" id="XMLID_314_"></path>
                        <path d="M26,8c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,6,26,6.896,26,8z" id="XMLID_315_"></path>
                        <path d="M26,24c0,1.104-0.896,2-2,2H8c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C25.104,22,26,22.896,26,24z" id="XMLID_316_"></path>
                    </g>
                </svg>
            </button>

            <!-- Navigation Links -->
            <div id="menu" class="hidden fixed inset-y-0 right-0 w-64 bg-[#333333] text-white z-10 shadow-lg transform translate-x-full transition-transform duration-300 lg:static lg:flex lg:translate-x-0 lg:space-x-4 lg:bg-transparent lg:shadow-none">
                <div id="close-btn" class="flex justify-end mr-10 my-10  z-10 text-gray-400 hover:text-white lg:hidden">
                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#ffffff"></path>
                        </g>
                    </svg>
                </div>
                <div class=" items-center h-full flex lg:flex-row flex-col">
                    <a href="#home" class="block px-4 py-2 hover:text-gray-400">Home</a>
                    <a href="#featured" class="block px-4 py-2 hover:text-gray-400">Featured</a>
                    <a href="#about" class="block px-4 py-2 hover:text-gray-400">About</a>
                    <a href="#news" class="block px-4 py-2 hover:text-gray-400">News</a>
                </div>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section class="py-16" id="home">
        <div class="container justify-center mx-auto flex flex-col lg:flex-row items-center gap-8">
            <div class="text-center lg:text-left max-w-[450px]">
                <h1 class="md:text-4xl text-2xl px-7 md:px-0 font-bold mb-4">TIMELESS ELEGENCE SINCE 1905</h1>
                <p class="md:text-lg text-base mb-6 px-7 md:px-0">Since 1905, Rolex has defined timeless elegance, precision, and innovation.</p>
                <a href="#featured" class="bg-[#BFBFBF] text-[#1f1f1f] md:mt-0 mt-3 px-6 py-3 rounded-sm hover:bg-gray-200">Explore Our Collection</a>
            </div>
            <img src="assets/contents/watch.png" alt="Watch" class="w-3/4 md:w-1/4">
        </div>
    </section>

    <!-- Featured Section -->
    <section class="py-16" id="featured">
        <div class="container mx-auto flex flex-col gap-10">
            <div class="flex flex-col items-center">
                <div class="w-[67px] h-[1px] bg-[#EFBE8A] mb-4"></div>
                <h2 class="text-3xl font-bold text-center mb-12">Featured</h2>
            </div>
            <!-- jassmaster -->
            <div class="flex flex-col md:flex-row justify-center gap-8 mt-5 md:p-0 p-5">
                <div class="py-12 px-16 w-full md:w-[550px] z-[1] h-full rounded-lg bg-[#333333] relative">
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
            <div class="flex flex-col md:flex-row-reverse justify-center gap-8 mt-5 md:p-0 p-5">
                <div class="py-12 px-16 w-full md:w-[550px] h-full rounded-lg bg-[#333333] relative">
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
                    <h1 class="text-3xl md:text-5xl text-center md:text-right  font-bold">
                        Built for Durability, Designed for Performance.
                    </h1>
                    <p class="mt-4 text-gray-400 text-center md:text-right ">
                        Ingersoll represents a rich legacy in watchmaking, with a history dating back to 1892. Known for its durability and reliability, this timepiece is designed for those who value high quality and functionality in all conditions. With a strong and practical design, Ingersoll is the perfect choice for those who demand performance without compromise.
                    </p>
                    <div class="flex justify-center md:justify-end ">
                        <button class="mt-6 bg-[#BFBFBF] text-black py-2 px-4 rounded hover:bg-gray-600">
                            Discover
                        </button>
                    </div>
                </div>
            </div>
            <!-- rose gold -->
            <div class="flex flex-col md:flex-row justify-center gap-8 mt-5 md:p-0 p-5">
                <div class="py-12 px-16 w-full md:w-[550px] h-full rounded-lg bg-[#333333] relative">
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
                        Timeless Luxury, Redefined.
                    </h1>
                    <p class="mt-4 text-gray-400">
                        Rose Gold offers timeless elegance with a modern touch of luxury. The beautiful rose gold finish provides a warm, refined look, while the precise mechanism makes it the ideal choice for those seeking a harmonious balance between aesthetic design and advanced technology in a watch.
                    </p>
                    <button class="mt-6 bg-[#BFBFBF] text-black py-2 px-4 rounded hover:bg-gray-600">
                        Discover
                    </button>
                </div>
            </div>
    </section>

    <!-- about section -->
    <section class="py-16" id="about">
        <div class="container mx-auto flex flex-col gap-10">
            <div class="flex flex-col items-center">
                <div class="w-[67px] h-[1px] bg-[#EFBE8A] mb-4"></div>
                <h2 class="text-3xl font-bold text-center mb-12">About</h2>
            </div>
            <div class="flex flex-col md:flex-row justify-center gap-8 md:p-0 p-5">
                <img alt="jassmaster" class="w-full h-full object-cover" src="assets/contents/history.png" />
                <div class="mt-8 md:mt-5 md:ml-8 text-center md:text-left pr-[5vw]">
                    <h1 class="text-3xl md:text-5xl  font-bold">
                        History
                    </h1>
                    <p class="mt-4 text-gray-400">
                        Founded in 1905 by Hans Wilsdorf and Alfred Davis in London, Rolex has grown to become one of the world’s most iconic and respected luxury watch brands. From the creation of the first waterproof wristwatch, the Oyster, to the development of the automatic date-change mechanism in the Datejust, Rolex has consistently led innovation in the watchmaking industry. Today, the company continues its legacy of precision, craftsmanship, and timeless elegance, serving watch connoisseurs and collectors around the globe.
                    </p>
                </div>
            </div>
        </div>
        <!-- vision and mission -->
        <div class="container mx-auto flex flex-col md:flex-row-reverse justify-center gap-8 mt-20 md:p-0 p-5">
            <img src="assets/contents/vision-mission.png" class="w-full h-full object-cover mt-0 md:mt-20" alt="" srcset="">
            <div class="mt-8 md:mt-12 md:ml-8 md:text-left  ">
                <h1 class="text-3xl md:text-5xl text-left font-bold">
                    Vision
                </h1>
                <p class="mt-4 text-gray-400 text-left">
                    To remain the global leader in the art of watchmaking, continually pushing the boundaries of precision, durability, and design, while upholding our legacy of luxury and innovation.
                </p>
                <h1 class="text-3xl md:text-5xl mt-10 text-left font-bold">
                    Mission
                </h1>
                <p class="mt-4 text-gray-400 text-left">
                    At Rolex, our mission is to craft timepieces of exceptional quality that embody the highest standards of performance and elegance. We are dedicated to excellence in design, engineering, and innovation, ensuring each watch we create serves as a symbol of timeless beauty, precision, and achievement.
                </p>
            </div>
        </div>
        <!-- cores and values -->
        <div class="container mx-auto flex flex-col md:flex-row justify-center gap-8 mt-20 md:p-0 p-5">
            <img src="assets/contents/core-values.png" class="md:w-3/4 w-full h-full object-cover mt-0 md:mt-20" alt="" srcset="">
            <div class="mt-8 md:mt-20 md:ml-8 md:text-left ">
                <h1 class="text-3xl md:text-5xl text-left font-bold">
                    Cores Values
                </h1>
                <h2 class="text-xl md:text-3xl mt-10 text-left font-bold">
                    Precission
                </h2>
                <p class="mt-3 text-gray-400 text-left">
                    We strive for perfection in every detail, ensuring our watches deliver unparalleled accuracy and reliability.
                </p>
                <h2 class="text-xl md:text-3xl mt-5 text-left font-bold">
                    Innovation
                </h2>
                <p class="mt-3 text-gray-400 text-left">
                    Always looking ahead, we embrace cutting-edge technology and new ideas to set new standards in watchmaking.
                </p>
                <h2 class="text-xl md:text-3xl mt-5 text-left font-bold">
                    Craftsmanship
                </h2>
                <p class="mt-3 text-gray-400 text-left">
                    Every Rolex watch is meticulously crafted with the finest materials, combining artistry and skill in every movement.
                </p>
                <h2 class="text-xl md:text-3xl mt-5 text-left font-bold">
                    Heritage
                </h2>
                <p class="mt-3 text-gray-400 text-left">
                    We honor our long-standing traditions while continuously evolving to meet the demands of modern life.
                </p>
                <h2 class="text-xl md:text-3xl mt-5 text-left font-bold">
                    Luxury
                </h2>
                <p class="mt-3 text-gray-400 text-left">
                    Rolex watches are a statement of success, offering a timeless blend of elegance, refinement, and sophistication.
                </p>

            </div>
        </div>
    </section>

    <!-- news section -->
    <section class="py-16 md:px-0 px-5" id="news">
        <div class="flex flex-col items-center">
            <div class="w-[67px] h-[1px] bg-[#EFBE8A] mb-4"></div>
            <h2 class="text-3xl font-bold text-center mb-12">News</h2>
        </div>
        <div class="container mx-auto flex flex-wrap gap-10">
            <!-- News Item 1 -->
            <div class="flex flex-col md:flex-row items-start gap-6">
                <img src="assets/contents/rolex-unviels.png" class="w-full md:w-1/3 h-auto" alt="Rolex Unveils">
                <div class="flex flex-col px-4">
                    <p class="text-gray-400 text-xs">3 January 2025</p>
                    <h3 class="text-white text-2xl md:text-3xl mt-1 mb-3">Rolex Unveils Its Latest Innovation: The Oyster Perpetual Explorer</h3>
                    <p class="text-md text-[#BFBFBF] line-clamp-3">Rolex has once again raised the bar in horology with the launch of its new Oyster Perpetual Explorer. Combining cutting-edge technology with the brand's signature precision, this new model pushes the boundaries of adventure and endurance. Designed for explorers and thrill-seekers, the Explorer features enhanced durability and an updated aesthetic, ensuring that it stands the test of time in the most extreme conditions.</p>
                    <button class="bg-[#BFBFBF] text-black py-2 px-4 my-4 rounded hover:bg-gray-600 w-fit">Read More</button>
                </div>
            </div>

            <!-- News Item 2 -->
            <div class="flex flex-col md:flex-row items-start gap-6">
                <img src="assets/contents/crafting-a-rolex.png" class="w-full md:w-1/3 h-auto" alt="Crafting a Rolex">
                <div class="flex flex-col px-4">
                    <p class="text-gray-400 text-xs">3 December 2024</p>
                    <h3 class="text-white text-2xl md:text-3xl mt-1 mb-3">The Art of Crafting a Rolex: Inside the Manufacturing Process</h3>
                    <p class="text-md text-[#BFBFBF] line-clamp-3">Rolex invites watch enthusiasts and collectors behind the scenes with an exclusive look into the meticulous craftsmanship that goes into every timepiece. From hand-assembling movements to the careful polishing of each case, this feature reveals the dedication and expertise behind every Rolex watch. Discover the precision, innovation, and tradition that continue to define Rolex’s legacy of excellence in watchmaking.</p>
                    <button class="bg-[#BFBFBF] text-black py-2 px-4 my-4 rounded hover:bg-gray-600 w-fit">Read More</button>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="flex flex-col md:flex-row items-start gap-6">
                <img src="assets/contents/rolex-celebrates.png" class="w-full md:w-1/3 h-auto" alt="Rolex Celebrates">
                <div class="flex flex-col px-4">
                    <p class="text-gray-400 text-xs">3 November 2024</p>
                    <h3 class="text-white text-2xl md:text-3xl mt-1 mb-3">Rolex Celebrates 120 Years of Timeless Elegance</h3>
                    <p class="text-md text-[#BFBFBF] line-clamp-3">This year marks a major milestone for Rolex as it celebrates 120 years of unparalleled excellence in watchmaking. A legacy that began in 1905 continues to shape the future of horology, with Rolex continuing to innovate while staying true to its roots of precision, craftsmanship, and luxury. Join us in celebrating this historic occasion, as we look back at the key moments that have defined the Rolex story over the decades.</p>
                    <button class="bg-[#BFBFBF] text-black py-2 px-4 my-4 rounded hover:bg-gray-600 w-fit">Read More</button>
                </div>
            </div>
        </div>
    </section>


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
                        <li><a href="#" class="hover:underline">About Us</a></li>
                        <li><a href="#" class="hover:underline">Products</a></li>
                        <li><a href="#" class="hover:underline">News</a></li>
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                        <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-4">Product</h2>
                    <ul>
                        <li><a href="#" class="hover:underline">Jazzmaster</a></li>
                        <li><a href="#" class="hover:underline">Ingersoll</a></li>
                        <li><a href="#" class="hover:underline">Rose Gold</a></li>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuBtn = document.getElementById("menu-btn");
            const closeBtn = document.getElementById("close-btn");
            const menu = document.getElementById("menu");

            menuBtn.addEventListener("click", function() {
                menu.classList.remove("hidden");
                menu.classList.remove("translate-x-full");
                menu.classList.add("translate-x-0");
            });

            closeBtn.addEventListener("click", function() {
                menu.classList.add("hidden");
                menu.classList.remove("translate-x-0");
                menu.classList.add("translate-x-full");
            });
        });
    </script>
</body>

</html>