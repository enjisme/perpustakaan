-- Membuat database
CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

-- Tabel user (admin & member)
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role ENUM('admin', 'member') NOT NULL
);

-- Tabel buku
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    cover VARCHAR(255) DEFAULT NULL
);

-- Data dummy admin
INSERT INTO user (username, password, role) VALUES 
('admin', 'admin123', 'admin');

-- Data dummy member
INSERT INTO user (username, password, role) VALUES 
('member1', 'member123', 'member');

-- Data dummy buku
INSERT INTO buku (judul, penulis, cover) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'laskar_pelangi.jpg'),
('Negeri 5 Menara', 'Ahmad Fuadi', 'negeri_5_menara.jpg'),
('Bumi', 'Tere Liye', 'bumi.jpg');
