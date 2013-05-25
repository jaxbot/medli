<?php 
require_once("include/database.php");
?>
<!DOCTYPE html>
<html>
<head>
<base href='<?=$BASE?>'/>
<title>Jaxbot</title>
<link rel='stylesheet' href='css/medli.css'>
<link rel='stylesheet' href='css/prettify.css'>
<script src='js/prettify_min.js'></script>
<script src='js/medli.js'></script>
<meta name="keywords" content="code, blog, jaxbot, <?php echo $tags; ?>" />
<script type="text/javascript">
var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-10561014-2']);_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body>
<div id='header'>
	<a href='./'><h1>Jaxbot's stuff</h1></a>
	<div id='info'>
<?php if ($postPage) { ?>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="Jaxbot" data-size="large" data-count="none">Tweet</a>
<?php } ?>
		<a href="https://twitter.com/jaxbot" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @jaxbot</a>
		<script async='true'>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div id='linkscontainer'>
		<a href='./'>home</a>
		<a href='http://github.com/jaxbot'>github</a>
		<a href='http://twitter.com/jaxbot'>twitter</a>
		<a href='http://flickr.com/jaxbot'>flickr</a>
	</div>
</div>
