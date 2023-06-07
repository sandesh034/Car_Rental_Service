CREATE DATABASE IF NOT EXISTS Ezy_Rentals;

USE Ezy_Rentals;

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS admins(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);


CREATE TABLE IF NOT EXISTS cars(
    id INT PRIMARY KEY AUTO_INCREMENT,
    make VARCHAR(50)  NOT NULL,
    model VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    price_per_day INT NOT NULL,
    pic VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS booking(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    car_id INT,
    duration INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
);
