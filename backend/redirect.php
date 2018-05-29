<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');

$ip = getIP();

$arr = $_SERVER['REQUEST_URI'];

$slang = preg_replace('/[^a-zA-Z0-9-_\.]/', '', $arr);


// Check if slang exists in db
if (!isSlangOK($slang)) {

	$pdo = getPDO();
	$stmntUpdate = $pdo->prepare('UPDATE items SET RedirectionNumber = RedirectionNumber + 1,
		LastAccessDate = NOW(),LastAccessedIP = :ip WHERE Slang = :Slang');
	$stmntUpdate->execute(['Slang' => $slang, 'ip' => $GLOBALS['ip']]);

	$stmnt = $pdo->prepare('SELECT * FROM items WHERE Slang = :Slang');
	$stmnt->execute(['Slang' => $slang]);
	$result = $stmnt->fetch();

	$url = $result['URL'];

	header("Location: $url");

}
else {
	abortRedirect("No URL to redirect.");
}
