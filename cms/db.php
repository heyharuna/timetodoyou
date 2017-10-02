<?php

	if (!function_exists('parseDate')) {
		function db_connect() {

			static $connection;

			if(!isset($connection)) {

				$config = parse_ini_file("../../config/time_config.ini");
				$connection = mysqli_connect("localhost",
											 $config["username"],
											 $config["password"],
											 $config["database"]);

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

	// for public
	function pub_connect() {
		static $connection;

		if(!isset($connection)) {

			$config = parse_ini_file("../config/time_config.ini");
			$connection = mysqli_connect("localhost",
										 $config["username"],
										 $config["password"],
										 $config["database"]);

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
	}
	// for admin page



?>
