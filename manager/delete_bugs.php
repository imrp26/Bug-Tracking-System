<?php
	include "connection.php";
	$id = $_GET["id"];
	mysqli_query($link, "delete from add_bugs where bug_id = $id");
?>

<script type="text/javascript">
	window.location = "display_bugs.php";
</script>