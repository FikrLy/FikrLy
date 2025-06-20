<?php
$host = 'localhost';
$db = 'ainlibya_db';
$user = 'root';
$pass = '';
$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
define('OWNER_EMAIL', 'beke2008g@gmail.com');
?>