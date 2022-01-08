<?php

    $dsn = 'mysql:dbname=librarydb;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $baglan = new pdo($dsn, $user, $password);
    } catch (PDOException $e) {
        echo "Bağlantı Kurulamadı!" . $e->getMessage();
    }
?>