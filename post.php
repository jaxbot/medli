<!DOCTYPE html>
<html>
<head>
<base href='http://localhost/medli/'/>
<title>Medli</title>
<link rel='stylesheet' href='css/medli.css'>
<link rel='stylesheet' href='css/prettify.css'>
<script src='js/prettify_min.js'></script>
</head>
<body>
<div id='header'>
	<h1>Jaxbot</h1>
	<div id='info'>
		Email: jaxbot@gmail.com
	</div>
</div>
<div id='post'>
    <?php
        require("include/database.php");
        require("lib/markdown.php");
        $results = mysql_query("SELECT * FROM posts WHERE id='".mysql_real_escape_string($_GET['id'])."'");
		$row = mysql_fetch_array($results);
		$body = markdown($row["body"]);
	?>
	<h1><?=$row['title']?></h1>
	<?=$body?>
	<br><br>
	<div id="disqus_thread"></div>
	<script type="text/javascript">
		var disqus_shortname = 'societyofcode';
		/* * * DON'T EDIT BELOW THIS LINE * * */
		/* Psh, YOLO. */

		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
</div>
<script>
    prettyPrint();
</script>
</body>
</html>
