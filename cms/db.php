<?php
	function db_connect() {
		static $connection;

		if(!isset($connection)) {

			$host = "localhost";
			$username = "root";
			$password = "root";
			$db = "mike_db";

			$connection = mysqli_connect($host, $username, $password, $db);

			if(!$connection) {
				return mysqli_error();
			}
			else {
				return $connection;
			}
		}
		else {
			return $connection;
		}
	}

	function db_close($conn) {
		if(!$conn) {
			mysqli_close($conn);
		}
	}
?>
