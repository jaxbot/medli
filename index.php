<?php 
    require("include/header.php");
    require("lib/markdown.php");
?>
<div id='pincontainer'></div>
<script>
<?php
    $results = mysql_query("SELECT * FROM posts ORDER BY `time` DESC");
    $posts = array();
    while ($row = mysql_fetch_array($results)) {
        if (strlen($row['body']) > 800) {
            $body = "";
            if (stripos($row['body'], "<img") !== false) {
                $s = explode("<img ", $row['body']);
                $s = explode("src=", $s[1]);
                $s = explode(">", $s[1]);
                $body = "<img src=" . addslashes($s[0]) . ">";
            }
        } else {
            $body = addslashes(str_replace("\r", "", str_replace("\n", "", markdown($row["body"]))));
        }
        $posts[] = $row;
?>
    renderPinItem({ content: "<h1><?=$row['title']?></h1><?=$body?>", category: "<?=$row['category']?>", action: "articles/<?=$row['id']?>" });
<?php
    }
?>

    window.addEventListener("hashchange", renderBoard, true);
    window.addEventListener("load", renderBoard, true);
    window.addEventListener("resize", renderBoard, true);
    renderBoard();
    prettyPrint();
</script>
<noscript>
You don't have JavaScript enabled, so here's a static list of my articles:<br>
<?php 
    foreach ($posts as $post) {
        echo "<a href='articles/" . $post['id'] . "'>" . $post['title'] . "</a><br>";
    }
?>
</noscript>
</body>
</html>
