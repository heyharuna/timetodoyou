<?php
	session_start();

	if(isset($_GET["logOut"]) OR !isset($_SESSION["username"])) {
		session_unset();
		session_destroy();

		echo "<script>location.replace('login.php')</script>";
	}
?>
