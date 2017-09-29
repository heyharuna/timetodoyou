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
  <div class="cmsPage">
		<div class="menuBar">
			<div><a href="_tour_admin.php">PAGES</a></div>
			<div><a href="_insertTour.php">CREATE</a></div>
			<div><a href="_uploadImage.php">Upload Image</a></div>
			<div><a href="info.php">Info</a></div>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
				<input type="submit" name="logOut" value="Log Out">
			</form>
		</div>
		<div class="formDiv">
			<div class="newBlog">
				<h1>Create New Blog</h1>
				<div class="edit">
					<?php include "partials/toolBar.php";?>
					<div class="newForm">
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
							<label>Date</label><input name="newDate" required><br>
							<label>Nation</label><input name="newNation" required><br>
							<label>State</label><input name="newState" required><br>
							<label>Venue</label><input name="newVenue" required><br>
							<p>Select Image</p>
							<select id="imageSelect" name="newImgSelect">
							<?php
								foreach(glob('img/tourschedule/*[.jpg, .PNG]') as $filename){
								    echo "<option name='newPhoto'>" . $filename . "</option>";
								}
							?>
							</select>
							<div class="showPic"><img  id="showPhoto" src=""></div>
							<input type="submit" name="insertTour" class="newBlogBtn" id="submitBtn">
						</form>
					</div>
				</div>
			</div>
			<?php
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
					include "db.php";
					db_connect();

					if(!db_connect()){
						die("<p>Connection failed because".mysqli_connect_error()."</p>");
					}
					else {
						mysqli_set_charset(db_connect(), "utf-8");
						echo "<p style='color: #F45D4C;'>CONNECTED</p>";

						if(isset($_POST['insertTour'])) {
							//get new data, title ,content variable
							$newDate = mysqli_real_escape_string(db_connect(), $_POST["newDate"]);
							$newNation= mysqli_real_escape_string(db_connect(), $_POST['newNation']);
							$newState= mysqli_real_escape_string(db_connect(), $_POST['newState']);
							$newVenue= mysqli_real_escape_string(db_connect(), $_POST['newVenue']);
							$newPhoto = mysqli_real_escape_string(db_connect(), $_POST["newImgSelect"]);

							//create variable to insert
							$insert = "INSERT INTO tour_tb (date, nation, state, venue, img)
										VALUES('".$newDate."', '".$newNation."', '".$newState."',  '".$newVenue."', '".$newPhoto."')";
							$insertQuery = mysqli_query(db_connect(), $insert);
							var_dump($insertQuery);
							//echo "<script>window.location = '_tour_admin.php';</script>";

							if($insertQuery === true) {
								echo "<script>window.location = '_tour_admin.php';</script>";
							}
							else{
								echo "<p>Please submitt again.</p>";
							}
						}//click insertBtn

						//close database
						db_close(db_connect());
					}
			?>
	  </div>
	</div>
	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="module/js/main.js"></script>
</body>
</html>
