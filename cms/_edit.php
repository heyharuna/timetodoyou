<?php include "partials/_logOut.php";?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
	<link href="module/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href='https://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css' rel='stylesheet'>
	<link rel="stylesheet" href="module/css/style.css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
</head>
<body>
	<div class="cmsPage editPage">
		<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);


			include "db.php";
			if(isset($_GET["id"])) {
				db_connect();
				//var_dump($_GET["id"]);
				if(db_connect()) {
					$id = mysqli_real_escape_string(db_connect(), $_GET["id"]);
					$tb = mysqli_real_escape_string(db_connect(), $_GET["tb"]);

					$query = "SELECT * FROM ".$tb." WHERE id = '".$id."'";
					$queryResult = mysqli_query(db_connect(), $query);

					if($queryResult) {

						if($tb === "tour_tb") {
							echo "<div class='menuBar'>";
							echo 		"<div><a href='admin.php'>PAGES</a></div>";
							echo 		"<div><a href='_insert.php'>CREATE</a></div>";
							echo 		"<div><a href='_uploadImage.php'>Upload Image</a></div>";
							echo  	"<div><a href='info.php'>Info</a></div>";
							echo 		"<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='GET'>
								<input type='submit' name='logOut' value='Log Out'>
							</form>";
							echo "</div>";
							echo "<div class='formDiv'>";
							echo "<h1>Edit</h1>";
							echo "<div class='edit'>";
							include "partials/toolBar.php";
							echo "<div class='editSec'>";
							echo "<form action='partials/_edit_process.php' method='POST'>";

							while( $rowArray = mysqli_fetch_assoc($queryResult)){
								$id = $rowArray["id"];
								$date = $rowArray["date"];
								$nation = $rowArray["nation"];
								$state = $rowArray["state"];
								$venue = $rowArray["venue"];
								$img = $rowArray["img"];

			          echo '<label>ID</label><input type ="hidden" name="id" value="'.$id.'">
								<br><br>';
								echo '<label>Table</label><input type ="hidden" name="tb" value="'.$tb.'">
								<br><br>';
								echo '<label>DATA</label><input type ="data" name="tourDate" value="'.$date.'">
								<br><br>';
								echo '<label>Country</label><input type ="text" name="tourNation" value="'.$nation.'">
								<br><br>';
								echo '<label>State</label><input type ="text" name="tourState" value="'.$state.'">
								<br><br>';
								echo '<label>Venue</label><input type ="text" name="tourVenue" value="'.$venue.'">
								<br><br>';
								echo '<label>Upload Image</label><select id="imageSelect" name="imgSelect">';
									foreach(glob('img/tourschedule/*[.jpg, .PNG]') as $filename){
									    echo "<option>" . $filename . "</option>";
									}
								echo '</select>';
								echo '<button type="button" id="insertImage" onClick="insertImage()">Insert Image</button><br><br>';
								echo '<div class="showPic"><img id="showPhoto" src="'.$img
								.'"></div>';
								echo '<input type="submit" value="Edit" name="submit" id="submitBtn">';
							}// tb_1 while
							echo "</form>";
							echo "</div>";//close editSec
							echo "</div>";//close edit
							echo "</div>";//close formDiv

						}// tb_1 if

						if($tb === "news_tb") {
							echo "<div class='menuBar'>";
							echo 		"<div><a href='admin.php'>PAGES</a></div>";
							echo 		"<div><a href='_insert.php'>CREATE</a></div>";
							echo 		"<div><a href='_uploadImage.php'>Upload Image</a></div>";
							echo  	"<div><a href='info.php'>Info</a></div>";
							echo 		"<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='GET'>
								<input type='submit' name='logOut' value='Log Out'>
							</form>";
							echo "</div>";
							echo "<div class='formDiv'>";
							echo "<h1>Edit</h1>";
							echo "<div class='edit'>";
							include "partials/toolBar.php";
							echo "<div class='editSec'>";
							echo "<form action='partials/_edit_process.php' method='POST'>";
							while( $rowArray = mysqli_fetch_assoc($queryResult)){
								$id = $rowArray["id"];
								$date = $rowArray["date"];
								$title = $rowArray["title"];
								$subtitle = $rowArray["subtitle"];
								$locate = $rowArray["locate"];
								$img_1 = $rowArray["img_1"];
								$img_2 = $rowArray["img_2"];
								$text = $rowArray["text"];

			          echo '<label>Id</label><input type ="hidden" name="id" value="'.$id.'">
								<br><br>';
								echo '<label>Table</label><input type ="hidden" name="tb" value="'.$tb.'">
								<br><br>';
								echo '<label>Date</label><input type ="data" name="newsDate" value="'.$date.'">
								<br><br>';
								echo '<label>Title</label><input type ="text" name="newsTitle" value="'.$title.'">
								<br><br>';
								echo '<label>Locate</label><input type ="text" name="newsLocate" value="'.$locate.'">
								<br><br>';
								echo '<label>Subtitle</label><input type ="text" name="newsSubtitle" value="'.$subtitle.'">
								<br><br>';
								echo '<label>Text</label>
											<div id="editor" contenteditable>'.$text.'</div>
								<br><br>';
								echo '<input type="hidden" name="newsText" id="changeContent">';
								echo '<label>Upload Image</label><select id="imageSelect_1" name="newsImgSelect_1">';
									foreach(glob('img/news/*[.jpg, .PNG]') as $filename){
									    echo "<option>" . $filename . "</option>";
									}
								echo '</select>';
								echo '<label>Upload Image</label><select id="imageSelect" name="newsImgSelect_2">';
									foreach(glob('img/news/*[.jpg, .PNG]') as $filename){
									    echo "<option>" . $filename . "</option>";
									}
								echo '</select>';
								echo '<button type="button" id="insertImage" onClick="insertImage()">Insert Image</button><br><br>';
								echo '<div class="showPic"><img id="showPhoto_1" src="'.$img_1
								.'"></div>';
								echo '<div class="showPic"><img id="showPhoto_2" src="'.$img_2
								.'"></div>';
								echo '<input type="submit" value="Edit" name="submit" id="submitBtn">';
							}//while
							echo "</form>";
							echo "</div>";//close editSec
							echo "</div>";//close edit
							echo "</div>";//close formDiv
						}//if

					}//q result

						db_close(db_connect());
					}//db_connect()
				}//isset($_GET["id"])
		?>
		</div>
	</div>
	</div>
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="module/js/main.js"></script>
</body>
</html>
