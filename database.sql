-- Create database
CREATE DATABASE IF NOT EXISTS course_db;
USE course_db;

-- Create users table for registration
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    student_email VARCHAR(100) UNIQUE NOT NULL,
    student_phone VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    address TEXT NOT NULL,
    department VARCHAR(100) NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    semester VARCHAR(10) NOT NULL,
    year INT NOT NULL,
    preferred_time TIME NOT NULL,
    mode_of_study TEXT,
    photo VARCHAR(255),
    registration_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);