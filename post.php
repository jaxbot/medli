<?php 
	require("include/database.php");
	$results = mysql_query("SELECT * FROM posts WHERE id='".mysql_real_escape_string($_GET['id'])."'");
	$row = mysql_fetch_array($results);
	$tags = $row['tags'];
	$title = $row['title'];
	$id = $row['id'];
	$postPage = true;
	require("include/header.php");
?>
<iframe src='./' name='mainpage' id='mainpage'></iframe>
<div id='post'>
    <?php
        require("lib/markdown.php");
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

		var disqus_identifier = "<?php echo $row['id']; ?>";
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();

		history.pushState({ loaded: 1 }, "", location.href);
		window.onload = function() {
            if (navigator.userAgent.indexOf("Mobile") !== -1) return;
			window.onpopstate = function(state) {
				_g("mainpage").style.display = (history.state ? "none" : "block");
				if (!history.state) {
					history.replaceState(null, "", "#");
				}
			}
		}
	</script>
</div>
<script>
    prettyPrint();
</script>
</body>
</html>
