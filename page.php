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
<script type="text/javascript">
var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-10561014-2']);_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<script src='//platform.twitter.com/widgets.js' async='true'></script></head>
<body>
    <div id='info'>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="Jaxbot" data-size="large" data-count="none">Tweet</a>
		<a href="https://twitter.com/jaxbot" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @jaxbot</a>
	</div>
<div id='post' style='width: 700px'>
	<?php echo Markdown(file_get_contents("pages/" . $_GET['id'] . ".md")); ?>
</div>
<script>
prettyPrint();
</script>
</body>
</html>

