-- إنشاء قاعدة البيانات إذا لم تكن موجودة بالفعل
CREATE DATABASE IF NOT EXISTS reservations_database;

-- استخدام قاعدة البيانات التي تم إنشاؤها
USE reservations_database;

-- إنشاء جدول لتخزين بيانات الحجوزات
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    guard_number VARCHAR(10) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
