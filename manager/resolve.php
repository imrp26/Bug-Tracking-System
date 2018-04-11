<?php
	include "connection.php";
	$id=$_GET["id"];
	$res=mysqli_query($link,"delete from issue_bugs where id=$id");
?>

<script type="text/javascript">
	window.location="resolve_bugs.php";
</script>