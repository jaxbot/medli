<?php 
    require("include/header.php");
?>
<div id='pincontainer'></div>
<script>
    _g("linkscontainer").innerHTML = "<a href='#'>all</a>";
    <?php
        require("include/database.php");
        require("lib/markdown.php");
        $results = mysql_query("SELECT * FROM posts ORDER BY `time` DESC");
        while ($row = mysql_fetch_array($results)) {
            $body = addslashes(str_replace("\r", "", str_replace("\n", "<br>", markdown($row["body"]))));
            if (strlen($body) > 500) {
                $body = "";
                if (stripos($row['body'], "<img") !== false) {
                    $s = explode("<img ", $row['body']);
                    $s = explode("src=", $s[1]);
                    $s = explode(">", $s[1]);
                    $body = "<img src=" . addslashes($s[0]) . ">";
                }
            }
?>
    renderPinItem({ content: "<h1><?=$row['title']?></h1><?=$body?>", category: "<?=$row['category']?>", action: "articles/<?=$row['id']?>" });
<?php
        }
    ?>
	renderBoard(location.hash.substring(1));
    prettyPrint();
</script>
</body>
</html>
