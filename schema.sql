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

CREATE TABLE IF NOT EXISTS featured_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tagline VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES admins(id) ON DELETE SET NULL
);

INSERT INTO featured_products (tagline, description, image_url, created_by) VALUES
    ('WHERE PRECISION MEETS ELEGANCE.', 'Jazzmaster embodies precision and elegance in its finest form. With a classic design that seamlessly blends sophistication and accuracy, this timepiece is perfect for those who value craftsmanship and beauty in every detail. Each tick of the Jazzmaster represents a fusion of tradition and innovation in horology.', '/assets/featured-products/6798f08bb58cd.png', 1),
    ('BUILT FOR DURABILITY, DESIGNED FOR PERFORMANCE.', 'Ingersoll represents a rich legacy in watchmaking, with a history dating back to 1892. Known for its durability and reliability, this timepiece is designed for those who value high quality and functionality in all conditions. With a strong and practical design, Ingersoll is the perfect choice for those who demand performance without compromise.', '/assets/featured-products/6798f276ccae6.png', 1),
    ('TIMELESS LUXURY, REDEFINED.', 'Rose Gold offers timeless elegance with a modern touch of luxury. The beautiful rose gold finish provides a warm, refined look, while the precise mechanism makes it the ideal choice for those seeking a harmonious balance between aesthetic design and advanced technology in a watch.', '/assets/featured-products/6798f2886004e.png', 1);
