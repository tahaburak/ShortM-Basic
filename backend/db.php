<?php

require __DIR__ . '/vendor/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


function connectToDB()
{

	$host = getenv("DB_HOST");
	$db = getenv("DB_DATABASE");
	$user = getenv("DB_USERNAME");
	$pass = getenv("DB_PASSWORD");
	$charset = 'utf8';

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+03:00'"
	];
	$pdo = null;
	try {
		$pdo = new PDO($dsn, $user, $pass, $opt);
	} catch (PDOException $PDOException) {

		abortRedirect('DB connection Error : ' . $PDOException->getMessage());
	}


	return $pdo;
}

?>
