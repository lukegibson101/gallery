<?php

// Database Connection Constants
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'gallery_db';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($connection) {
    echo "We are connected";
}

echo "test";