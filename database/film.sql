CREATE DATABASE IF NOT EXISTS film_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE film_db;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    tahun YEAR NOT NULL,
    negara VARCHAR(50) NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO film (judul, sutradara, genre, tahun, negara, rating) VALUES
('Aftersun', 'Charlotte Wells', 'Drama', 2022, 'Britania Raya', 7.6),
('Inception', 'Christopher Nolan', 'Sci-Fi', 2010, 'Amerika Serikat', 8.8),
('Parasite', 'Bong Joon-ho', 'Thriller', 2019, 'Korea Selatan', 8.5),
('Laskar Pelangi', 'Riri Riza', 'Drama', 2008, 'Indonesia', 7.8),
('Spirited Away', 'Hayao Miyazaki', 'Animasi', 2001, 'Jepang', 8.6);

