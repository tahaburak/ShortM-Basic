<?php

if (session_status() !== PHP_SESSION_ACTIVE && empty(session_id())) {
	session_start();
}


function destroyTheSession()
{
	if (session_status() !== PHP_SESSION_NONE) {
		$_SESSION = array();
		session_destroy();
		header('Location: /');
	}
}
