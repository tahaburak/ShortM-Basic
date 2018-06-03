<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/db.php');

$operationBackEnd = "shorten";

//check the operation name just in case
if (!array_key_exists('operation', $_POST) || $_POST['operation'] !== $operationBackEnd) {
	abortRedirect("İşlem Hatası.");

} elseif (!array_key_exists('url', $_POST) || empty($_POST['url'])) {
	abortRedirect("Kısaltılacak URL bulunamadı.");
} else {

	$ip = $_POST['ip'];
	$url = filter_var(addHTTPProtocolIfNeeded(strip_tags($_POST['url'])),FILTER_SANITIZE_URL);

	// an example controller
	if (strlen($url) < 5) {
		abortRedirect('An URL can not be shorter than 5 characters.');
	}

	if (!validateURL($url)) {
		abortRedirect('Please enter a valid URL.');

	}


	$slang = generateReadableRandomString();

	while (!isSlangOK($slang)) {
		$slang = generateReadableRandomString();
	}

	saveToDB($url, $slang, $ip);
	$_SESSION['savedURL'] = $url;
	$_SESSION['savedSlang'] = $slang;
	header('Location: /result');

}
