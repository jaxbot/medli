<?php
require("include/database.php");
require("include/auth.php");

if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	$uploadfile = "pics/" . $_FILES['file']['name'];
	
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		echo "<script>top.addImage('" . $uploadfile . "');window.close();</script>";
	}
}
