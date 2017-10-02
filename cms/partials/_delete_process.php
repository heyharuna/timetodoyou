<?php

	include "../db.php";
	db_connect();

	if(db_connect()) {
		if(isset($_GET["id"])) {
			$id = mysqli_real_escape_string(db_connect(), $_GET['id']);
			//$tb = mysqli_real_escape_string(db_connect(), $_GET['tb']);

			$delete = "DELETE FROM product_tb WHERE id = ".$id."";
			$deleteQuery = mysqli_query(db_connect(), $delete);

			if($deleteQuery) {
				echo "<script>window.location = '../admin.php';</script>";
			}
			else {
				echo "<h3>Delete Failed</h3>";
			}
		}
		db_close(db_connect());

	}



?>
