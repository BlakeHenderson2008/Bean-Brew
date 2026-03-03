-- Active: 1764399938520@@127.0.0.1@3306@bean_and_brew
CREATE DATABASE IF NOT EXISTS bean_and_brew;

CREATE TABLE IF NOT EXISTS bean_and_brew.customer_details (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email_address VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS bean_and_brew.booking_space (
    bs_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    location VARCHAR(255),
    date DATE,
    time TIME,
    guests INT,
    FOREIGN KEY (customer_id) REFERENCES customer_details(customer_id)
);