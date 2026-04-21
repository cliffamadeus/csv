CREATE DATABASE sample_db;
USE sample_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    created_at DATETIME
);

INSERT INTO users (name, email, created_at) VALUES
('Alice Johnson', 'alice@example.com', NOW()),
('Bob Smith', 'bob@example.com', NOW()),
('Charlie Brown', 'charlie@example.com', NOW());