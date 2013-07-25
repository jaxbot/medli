<?php
require("include/database.php");
require("include/auth.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='css/medli.css'>
		<link rel='stylesheet' href='css/admin.css'>
		<base href='<?php echo $BASE; ?>'>
		<script>
			function confirmdelete() {
				return confirm("Are you sure you want to delete this post?");
			}
			function addImage(data) {
				document.getElementById("body").value += "<p><img src='<?php echo $base; ?>" + data + "'></p>";
			}
			function setContent(html) {
				document.getElementById("editor").innerHTML = html;
			}
			function updateId(str) {
				str = str.toLowerCase();
				str = str.replace(/[^\w\s]|_/g, "").replace(/\s+/g, "-");
				
				var d = new Date();
				
				str += "_" + (d.getMonth() + 1) + "_" + (d.getDate()) + "_" + d.getFullYear();
				document.getElementById("postid").value = str;
			}
			function preventTab(e,sender) {
				if (!e)
					e = window.event;
					
				var keyCode = e.keyCode || e.which;
				if (keyCode == 9) {
					e.preventDefault();
					var start = sender.selectionStart;
					sender.value = sender.value.substring(0,sender.selectionStart) + "\t" + sender.value.substring(sender.selectionEnd);
					sender.selectionStart = sender.selectionEnd = start+1;
				}
			}
			</script>
	</head>
	<body>
	<?php
		if ($_POST['save'] != "") {
			if ($_GET['edit'] == "true") {
				$query = "UPDATE `posts` SET `title` = '" . mysql_real_escape_string($_POST['title']) . "',
				`body` = '" . mysql_real_escape_string($_POST['body']) . "',
				`tags` = '" . mysql_real_escape_string($_POST['tags']) . "',
				`category` = '" . mysql_real_escape_string($_POST['category']) . "'
				WHERE `id` = '" . mysql_real_escape_string($_POST['id']) . "';";
				
			} else {
				$query = "INSERT INTO `posts` (`id`,`title`,`body`,`tags`,`category`,`time`) VALUES
				('" . mysql_real_escape_string($_POST['id']) . "',
				'" . mysql_real_escape_string($_POST['title']) . "',
				'" . mysql_real_escape_string($_POST['body']) . "',
				'" . mysql_real_escape_string($_POST['tags']) . "',
				'" . mysql_real_escape_string($_POST['category']) . "',
				'" . time() . "')";
			}
			if (mysql_query($query)) {
					echo "Succes!<br>";
				} else {
					echo "nope: " . mysql_error();
				}
		}
		if ($_GET['delete'] != "") {
			$query = "DELETE FROM `posts` WHERE `id` = '" . mysql_real_escape_string($_GET['delete']) . "';";
			mysql_query($query);
			echo mysql_error();
		}
		if ($_GET['id'] != "") {
			if ($_GET['id'] != "new") {
				
				$query = "SELECT * FROM posts WHERE `id` = '" . mysql_real_escape_string($_GET['id']) . "';";
				$results = mysql_query($query);
				$data = mysql_fetch_array($results);
			}
				
				?>
				<form action='admin.php<?php if ($_GET['id'] != "new") { ?>?edit=true<?php } ?>' method='POST'>
					<input type='text' class='title' name='title' value='<?php echo $data['title']; ?>' <?php if ($_GET['id'] == "new") { ?> onKeyUp='updateId(this.value);' <?php } ?>>
					<textarea name='body' onkeydown='preventTab(event,this);' id='body' class='editor'><?php echo $data['body']; ?></textarea>
					<br>
					Tags: <input type='text' name='tags' value='<?php echo $data['tags']; ?>'> 
					Id: <input type='text' name='id' id='postid' value='<?php echo $_GET['id']; ?>'><br>
					Category: <input type='text' name='category' value='<?php echo $data['category']; ?>'><br>
					<input type='submit' value='Save' name='save' onClick='body.value=document.getElementById("editor").innerHTML;'>
				</form>
				<iframe name='datapusher' id='datapusher' style='display: none'></iframe>
				<h2>Upload image</h2>
				<form action='uploadimg.php' method='POST' enctype='multipart/form-data' target='datapusher'><input type='file' name='file'><br><input type='submit' value='Upload and insert'></form>
				<?php
			
		} else {
	?>
	<a href='admin.php?id=new'>New</a><br><br>
	<b>Current posts</b>
	<table>
		<tr><td width=500>Title</td><td>Date</td><td></td></tr>
<?php



$query = "SELECT * FROM posts ORDER BY `time` DESC;";

$results = mysql_query($query);

$posts = array();

while ($data = mysql_fetch_array($results)) {
	echo "<tr><td><a href='admin.php?id=" . $data["id"] . "'>" . $data["title"] . "</a></td><td>" . date("m-d-y h:i:s a", $data["time"]) . "</td><td><a href='admin.php?delete=" . $data["id"]."' onClick='return confirmdelete();'>x</a></td></tr>";
}
}
?>

	</table>
	</body>
</html>
