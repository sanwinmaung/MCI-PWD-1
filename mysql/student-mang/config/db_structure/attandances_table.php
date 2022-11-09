<?php

$sql .= "CREATE TABLE IF NOT EXISTS attandances (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    student_id INT(11) NOT NULL,
    class_id INT(11) NOT NULL,
    date DATE NOT NULL,
    status ENUM ('present', 'absent', 'leave') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";