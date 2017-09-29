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
		<div class="menuBar" role="menu">
			<div><a href="admin.php">Home</a></div>
			<div><a href="_news_admin.php">All Articles</a></div>
			<div><a href="_insert.php">Create</a></div>
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
							<label>Title</label><input name="newTitle" required><br>
							<label>SubTitle</label><input name="newSubtitle" required><br>
							<label>Locate</label><input name="newLocate" required><br>
							<label>Content</label><div id="editor" contenteditable></div><br>
							<input type="hidden" name="newContent" id="changeContent">
							<p>Select Top Image</p>
							<select id="imageSelect_1" name="imgSelect_1">
							<?php
								foreach(glob('img/news/*[.jpg, .PNG]') as $filename){
								    echo "<option name='newPhoto'>" . $filename . "</option>";
								}
							?>
							</select>
							<p>Select Second Image</p>
							<select id="imageSelect_2" name="imgSelect_2">
							<?php
								foreach(glob('img/news/*[.jpg, .PNG]') as $filename){
								    echo "<option name='newPhoto'>" . $filename . "</option>";
								}
							?>
							</select>
							<div class="showPic"><img  id="showPhoto_1" src=""></div>
							<div class="showPic"><img  id="showPhoto_2" src=""></div>
							<input type="submit" name="insertArticle" class="newBlogBtn" id="submitBtn">
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

						if(isset($_POST['insertArticle'])) {
							//get new data, title ,content variable
							$date = mysqli_real_escape_string(db_connect(), $_POST["newDate"]);
							$title = mysqli_real_escape_string(db_connect(), $_POST["newTitle"]);
							$subtitle = mysqli_real_escape_string(db_connect(), $_POST["newSubtitle"]);
							$locate = mysqli_real_escape_string(db_connect(), $_POST["newLocate"]);
							$content = mysqli_real_escape_string(db_connect(), $_POST["newContent"]);
							$photo_1 = mysqli_real_escape_string(db_connect(), $_POST["imgSelect_1"]);
							$photo_2 = mysqli_real_escape_string(db_connect(), $_POST["imgSelect_2"]);

							//create variable to insert
							$insert = "INSERT INTO news_tb (date, title, subtitle, locate, text, img_1, img_2)
										VALUES('".$date."', '".$title."', '".$subtitle."', '".$locate."', '".$content."', '".$photo_1."', '".$photo_2."')";
							$insertQuery = mysqli_query(db_connect(), $insert);

							if($insertQuery === true) {
								echo "<script>window.location = '_news_admin.php';</script>";
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
