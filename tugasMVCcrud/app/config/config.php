<?php

// Bentuk BASEURL secara dinamis sehingga cocok di berbagai environment (Laragon, XAMPP, dll.)
// Contoh hasil: http://localhost/prakweb_2025_B_233040054/TemplateMVC/public
if (!defined('BASEURL')) {
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
	$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
	// dirname($_SERVER['SCRIPT_NAME']) saat file ini di-include dari public/index.php
	// akan menghasilkan path ke folder public, mis: /prakweb_2025_B_233040054/TemplateMVC/public
	$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
	define('BASEURL', $protocol . '://' . $host . $basePath);
}

// DATANASE
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'phpmmvc');
