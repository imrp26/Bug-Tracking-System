<?php
	include "connection.php";
	$userid=$_GET["userid"];
	mysqli_query($link,"update user_registration set status='no' where userid=$userid");
?>

<script type="text/javascript">
	window.location="display_user_info.php";
</script>