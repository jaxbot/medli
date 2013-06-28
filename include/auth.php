<?php 

if ($_SERVER['PHP_AUTH_USER'] != "Jaxbot" or $_SERVER['PHP_AUTH_PW'] != $PASSWORD) {
	header('WWW-Authenticate: Basic realm="soc"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'No.';
	exit;
}
