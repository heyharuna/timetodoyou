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
  			<div>
  				<a href="admin.php">Product page</a>
  				<ul>
  					<li><a href="_insertItem.php">Create New Item</a></li>
  					<li><a href="_uploadImage.php">Upload Image</a></li>
  				</ul>
  				<a href="info.php">Account Setting</a>
  			</div>
  			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
  				<input type="submit" name="logOut" value="Log Out">
  			</form>
  		</div>
		<div class="formDiv">
			<div class="newBlog">
				<h1>Create New Item</h1>
				<div class="edit">
					<div class="newForm">
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
							<label>Product Name</label><input name="newName" required><br>
							<label>Product Price</label><input name="newPrice" required><br>
							<label>Product Categories</label><input name="newCategories" required><br>
							<label>Product Description</label><input name="newDescription" required><br>
							<p>Select Top Image</p>
							<select id="imageSelect_1" name="imgSelect_1">
							<?php
								foreach(glob('img/product/*[.jpg, .PNG, .jpeg]') as $filename){
								    echo "<option name='newPhoto'>" . $filename . "</option>";
								}
							?>
							</select>
							<div class="showPic"><img  id="showPhoto_1" src=""></div>
							<input type="submit" name="insertNewItem" class="newBlogBtn" id="submitBtn">
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

						if(isset($_POST['insertNewItem'])) {
							//get new data, title ,content variable
							$name = mysqli_real_escape_string(db_connect(), $_POST["newName"]);
							$price = mysqli_real_escape_string(db_connect(), $_POST["newPrice"]);
							$categories = mysqli_real_escape_string(db_connect(), $_POST["newCategories"]);
							$description = mysqli_real_escape_string(db_connect(), $_POST["newDescription"]);
							$productImg = mysqli_real_escape_string(db_connect(), $_POST["imgSelect_1"]);

							//create variable to insert
							$insert = "INSERT INTO product_tb (name, price, categories, description, img)
										VALUES('".$name."', '".$price."', '".$categories."', '".$description."', '".$productImg."')";
							$insertQuery = mysqli_query(db_connect(), $insert);

							if($insertQuery === true) {
								echo "<script>window.location = 'admin.php';</script>";
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
