<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');

$dotEnv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
$dotEnv->load();

$env = getenv('ENV');
$prefix = '';

if ($env === 'production') {
	$prefix = 'PRODUCTION_';
} else {
	$prefix = 'DEV_';
}


$DB_HOST = getenv($prefix . 'DB_HOST');
$DB_DATABASE = getenv($prefix . 'DB_DATABASE');
$DB_USERNAME = getenv($prefix . 'DB_USERNAME');
$DB_PASSWORD = getenv($prefix . 'DB_PASSWORD');

$HOST = getenv($prefix . 'HOST');
$HOST_FULL = getenv($prefix . 'HOST_FULL');
$HOST_TITLE = getenv($prefix . 'HOST_TITLE');

return (object)array(

	'DB_HOST' => $DB_HOST,
	'DB_DATABASE' => $DB_DATABASE,
	'DB_USERNAME' => $DB_USERNAME,
	'DB_PASSWORD' => $DB_PASSWORD,
	'HOST' => $HOST,
	'HOST_FULL' => $HOST_FULL,
	'HOST_TITLE' => $HOST_TITLE
);
