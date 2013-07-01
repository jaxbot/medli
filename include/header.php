<?php 
require_once("include/database.php");
?>
<!DOCTYPE html>
<html>
<head>
<base href='<?=$BASE?>'/>
<title><?=($title != "" ? $title : "Jaxbot")?></title>
<?php 
if ($PRODUCTION) {
?>
<link rel='stylesheet' href='css/min.css'>
<script src='js/min.js'></script>
<?php 
} else {
?>
<link rel='stylesheet' href='css/medli.css'>
<link rel='stylesheet' href='css/prettify.css'>
<script src='js/prettify_min.js'></script>
<script src='js/medli.js'></script>
<?php 
}
?>
<meta name="referrer" content="always">
<meta name="keywords" content="code, blog, jaxbot, <?php echo $tags; ?>" />
<meta name="viewport" content="width=630, initial-scale=0.57, maximum-scale=0.57, user-scalable=1" />
<script type="text/javascript">
var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-10561014-2']);_gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<script src='//platform.twitter.com/widgets.js' async='true'></script>
</head>
<body>
<div id='header'>
    <a href='./'><h1 title='Developer. 18. Node, HTML5, CSS3. Friendly; talk to me'>Jaxbot</h1></a>
    <div id='info'>
        <?php if ($postPage) { ?>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="Jaxbot" data-size="large" data-count="none">Tweet</a>
        <?php } ?>
        <a href="https://twitter.com/jaxbot" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @jaxbot</a>
    </div>
    <div id='linkscontainer'>
        <a href='./'>home</a>
        <a href='http://twitter.com/jaxbot'>twitter</a>
        <a href='mailto:jaxbot@gmail.com'>contact</a>
    </div>
</div>
