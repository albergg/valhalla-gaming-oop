<?php
	require_once 'Classes/Databases/Config.php';
	$host = DB_HOST;
	$dbName = DB_NAME;
	$dsn = "mysql:host=$host; dbname=$dbName; charset=utf8mb4";
	$user = DB_USER;
	$pass = DB_PASS;
	$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	try {
		$conn = new PDO($dsn, $user, $pass, $opt);
		// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $exception) {
		echo $exception->getMessage();
	}