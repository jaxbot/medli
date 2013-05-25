<?php 
require_once("include/database.php");
?>
<!DOCTYPE html>
<html>
<head>
<base href='<?=$BASE?>'/>
<title>Medli</title>
<link rel='stylesheet' href='css/medli.css'>
<link rel='stylesheet' href='css/prettify.css'>
<script src='js/prettify_min.js'></script>
<script src='js/medli.js'></script>
<meta name="keywords" content="code, blog, jaxbot, <?php echo $tags; ?>" />
</head>
<body>
<div id='header'>
	<a href='./'><h1>Jaxbot</h1></a>
	<div id='info'>
		jaxbot@gmail.com<br>
		<a href='http://twitter.com/jaxbot'>@jaxbot</a><br>
	</div>
	<div id='linkscontainer'></div>
</div>
