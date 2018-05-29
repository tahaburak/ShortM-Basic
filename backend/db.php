<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');

$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();


function getPDO()
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


function isSlangOK($slang)
{

	$slangToSave = preg_replace("/[^A-Za-z0-9 ]/", '',
		strip_tags(trim($slang)));

	if (strlen($slangToSave) > 0) {
		$pdo = getPDO();

		if ($pdo !== null) {
			$stmnt = $pdo->prepare('SELECT * FROM items WHERE Slang = :Slang LIMIT 1');
			$stmnt->execute(['Slang' => $slangToSave]);
			$result = $stmnt->fetch();
			return empty($result);

		}

	} else {
		return false;
	}
	return false;
}

function saveToDB($url, $slang, $ip)
{
	if (strlen($url) > 0 || strlen($slang) > 0) {
		$pdo = getPDO();

		if ($pdo !== null) {
			$stmnt = $pdo->
			prepare('INSERT INTO items (Slang,URL,CreationDate,CreationIP) 
			VALUES (:Slang,:URL,NOW(),:ip)');

			$stmnt->execute(['Slang' => $slang, 'URL' => $url, 'ip' => $ip]);

		}
	}

}

function getAllTheItems()
{
	$pdo = getPDO();

	$stmnt = $pdo->prepare('SELECT * FROM items ORDER BY Id');
	$stmnt->execute();
	return $stmnt->fetchAll();
}


