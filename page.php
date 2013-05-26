<?php 
/* page.php
 * For viewing markdown pages
 */

require("lib/markdown.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../css/min.css'>
<script src='../js/min.js'></script>
</head>
<body>
<div id='post' style='width: 700px'>
	<?php echo Markdown(file_get_contents("pages/" . $_GET['id'] . ".md")); ?>
</div>
<script>
prettyPrint();
</script>
</body>
</html>

