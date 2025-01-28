CREATE DATABASE IF NOT EXISTS mydb;

USE mydb;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, email, password) VALUES
    ('admin', 'admin@gmail.com', '$2y$12$rgdhtdsB2UKSyGAeiVEJw.zeN9LyTiS5U3MZMGZHP449boMkzqeDK');

CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL
);

INSERT INTO news (title, slug, content, image_url, created_by) VALUES
    ('Rolex Celebrates 120 Years of Timeless Elegance', 'rolex-celebrates-120-years-timeless-elegance', 'This year marks a major milestone for Rolex as it celebrates 120 years of unparalleled excellence in watchmaking. A legacy that began in 1905 continues to shape the future of horology, with Rolex continuing to innovate while staying true to its roots of precision, craftsmanship, and luxury. Join us in celebrating this historic occasion, as we look back at the key moments that have defined the Rolex story over the decades.', '/assets/news/67990634738c5.png', 1),
    ('The Art of Crafting a Rolex: Inside the Manufacturing Process', 'the-art-of-crafting-a-rolex-inside-manufacturing-process', 'Rolex invites watch enthusiasts and collectors behind the scenes with an exclusive look into the meticulous craftsmanship that goes into every timepiece. From hand-assembling movements to the careful polishing of each case, this feature reveals the dedication and expertise behind every Rolex watch. Discover the precision, innovation, and tradition that continue to define Rolex’s legacy of excellence in watchmaking.', '/assets/news/6799061344881.webp', 1),
    ('Rolex Unveils Its Latest Innovation: The Oyster Perpetual Explorer', 'rolex-unveils-oyster-perpetual-explorer-latest-innovation', 'Rolex has once again raised the bar in horology with the launch of its new Oyster Perpetual Explorer. Combining cutting-edge technology with the brand''s signature precision, this new model pushes the boundaries of adventure and endurance. Designed for explorers and thrill-seekers, the Explorer features enhanced durability and an updated aesthetic, ensuring that it stands the test of time in the most extreme conditions.', '/assets/news/6799050225c6f.webp', 1);

CREATE TABLE IF NOT EXISTS featured_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    tagline VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL
);

INSERT INTO featured_products (name, tagline, description, image_url, created_by) VALUES
    ('Jazzmaster', 'WHERE PRECISION MEETS ELEGANCE.', 'Jazzmaster embodies precision and elegance in its finest form. With a classic design that seamlessly blends sophistication and accuracy, this timepiece is perfect for those who value craftsmanship and beauty in every detail. Each tick of the Jazzmaster represents a fusion of tradition and innovation in horology.', '/assets/featured-products/6798f08bb58cd.png', 1),
    ('Ingersoll', 'BUILT FOR DURABILITY, DESIGNED FOR PERFORMANCE.', 'Ingersoll represents a rich legacy in watchmaking, with a history dating back to 1892. Known for its durability and reliability, this timepiece is designed for those who value high quality and functionality in all conditions. With a strong and practical design, Ingersoll is the perfect choice for those who demand performance without compromise.', '/assets/featured-products/6798f276ccae6.png', 1),
    ('Rose Gold', 'TIMELESS LUXURY, REDEFINED.', 'Rose Gold offers timeless elegance with a modern touch of luxury. The beautiful rose gold finish provides a warm, refined look, while the precise mechanism makes it the ideal choice for those seeking a harmonious balance between aesthetic design and advanced technology in a watch.', '/assets/featured-products/6798f2886004e.png', 1);
