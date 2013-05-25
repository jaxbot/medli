<?php
$MYSQL_DB_HOST = "127.0.0.1";
$MYSQL_DB_USER = "root";
$MYSQL_DB_PW = "";
$MYSQL_DB = "soc";

if (mysql_pconnect($MYSQL_DB_HOST, $MYSQL_DB_USER, $MYSQL_DB_PW)) {
	if (mysql_select_db($MYSQL_DB)) {
		$IS_DATABASE_READY = true;
	}
}

$BASE = "http://192.168.1.128/medli/";
