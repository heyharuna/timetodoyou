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

			if($tb === "tour_tb"){
				$newDate = mysqli_real_escape_string(db_connect(), $_POST['tourDate']);
				$newNation= mysqli_real_escape_string(db_connect(), $_POST['tourNation']);
				$newState= mysqli_real_escape_string(db_connect(), $_POST['tourState']);
				$newVenue= mysqli_real_escape_string(db_connect(), $_POST['tourVenue']);
				$photo = mysqli_real_escape_string(db_connect(), $_POST["imgSelect"]);

				$update = "UPDATE ".$tb." SET date = '".$newDate."', nation =  '".$newNation."', state = '".$newState."', venue = '".$newVenue."', img = '".$photo."' WHERE id = ".$id."";

				$updateResult = mysqli_query(db_connect(), $update);

				if($updateResult) {
					echo "<script>window.location = '../_tour_admin.php';</script>";
				}
				else {
					echo "<p>Update Failed</p>";

				}
			}// tour_tb

			if($tb === "news_tb"){
				$newDate = mysqli_real_escape_string(db_connect(), $_POST['newsDate']);
				$newLocate= mysqli_real_escape_string(db_connect(), $_POST['newsLocate']);
				$newTitle= mysqli_real_escape_string(db_connect(), $_POST['newsTitle']);
				$newSubtitle= mysqli_real_escape_string(db_connect(), $_POST['newsSubtitle']);
				$newText= mysqli_real_escape_string(db_connect(), $_POST['newsText']);
				$photo_1 = mysqli_real_escape_string(db_connect(), $_POST["newsImgSelect_1"]);
				$photo_2 = mysqli_real_escape_string(db_connect(), $_POST["newsImgSelect_2"]);


				$update = "UPDATE news_tb SET date = '".$newDate."', locate= '".$newLocate."', title = '".$newTitle."', subtitle = '".$newSubtitle."', text = '".$newText."', img_1 = '".$photo_1."', img_2 = '".$photo_2."' WHERE id = '".$id."'";

				$updateResult = mysqli_query(db_connect(), $update);

				if($updateResult) {
					echo "<script>window.location = '../_news_admin.php';</script>";
				}
				else {
					echo "<p>Update Failed</p>";
				}
			}// news_tb


		}// submit button
		db_close(db_connect());
	}// db_connect()

?>
