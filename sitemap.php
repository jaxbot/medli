<?php
require("include/database.php");
header("Content-type: text/xml");

$results = mysql_query("SELECT * FROM posts ORDER BY `time` DESC");
$latest = 0;
$sites = "";
while ($post = mysql_fetch_array($results)) {
	if (!$latest) 
		$latest = $post['time'];
	$sites .= "<url>
		<loc>http://jaxbot.me/articles/" . $post['id'] . "</loc>
		<lastmod>" . date("Y-m-d", $post['time']) . "</lastmod>
		<priority>0.8</priority>
</url>\n";
}

echo "<";
?>?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>http://jaxbot.me/</loc>
	  <lastmod><?=date("Y-m-d", $latest)?></lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.9</priority>
   </url>
   <?=$sites?>
</urlset>
