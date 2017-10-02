<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	include "../db.php";
	db_connect();

	if(db_connect()) {
		if(isset($_POST["submit"])) {
			$tb = mysqli_real_escape_string(db_connect(), $_POST['tb']);
			$id = mysqli_real_escape_string(db_connect(), $_POST['id']);

			if($tb === "product_tb"){
				$name = mysqli_real_escape_string(db_connect(), $_POST["proName"]);
				$price = mysqli_real_escape_string(db_connect(), $_POST["proPrice"]);
				$categories = mysqli_real_escape_string(db_connect(), $_POST["proCategories"]);
				$description = mysqli_real_escape_string(db_connect(), $_POST["proDescription"]);
				$productImg = mysqli_real_escape_string(db_connect(), $_POST["imgSelect"]);

				$update = "UPDATE ".$tb." SET name = '".$name."', price =  '".$price."', categories = '".$categories."', description = '".$description."', img = '".$productImg."' WHERE id = ".$id."";

				$updateResult = mysqli_query(db_connect(), $update);

				if($updateResult) {
					echo "<script>window.location = '../admin.php';</script>";
				}
				else {
					echo "<p>Update Failed</p>";

				}
			}// tour_tb
		}// submit button
		db_close(db_connect());
	}// db_connect()

?>
