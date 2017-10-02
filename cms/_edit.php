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

					$query = "SELECT * FROM product_tb WHERE id = '".$id."'";
					$queryResult = mysqli_query(db_connect(), $query);
					$act = htmlentities($_SERVER['PHP_SELF']);

					if($queryResult) {

							echo "<div class='menuBar' role='menu'>";
							echo 	"<div>";
							echo 		"<a href='product.php'>Product page</a>";
							echo 		"<ul>";
							echo 			"<li><a href='_insertItem.php'>Create New Item</a></li>";
							echo 			"<li><a href='_uploadImage.php'>Upload Image</a></li>";
							echo 		"</ul>";
							echo 		"<a href='info.php'>Account Setting</a>";
							echo 	"</div>";
							echo 		"<form action='".$act."' method='POST'>";
							echo 			"<input type='submit'  name='logOut' value='Log Out'>";
							echo 		"</form>";
							echo "</div>";
							echo "<div class='formDiv'>";
							echo "<h1>Edit</h1>";
							echo "<div class='edit'>";
							include "partials/toolBar.php";
							echo "<div class='editSec'>";
							echo "<form action='partials/_edit_process.php' method='POST'>";

							while( $rowArray = mysqli_fetch_assoc($queryResult)){
								$id = $rowArray["id"];
								$name = $rowArray["name"];
								$price = $rowArray["price"];
								$description = $rowArray["description"];
								$categories = $rowArray["categories"];
								$img = $rowArray["img"];

			          			echo '<label>ID</label><input type ="hidden" name="id" value="'.$id.'">
								<br><br>';
								echo '<label>Table</label><input type ="hidden" name="tb" value="'.$tb.'">
								<br><br>';
								echo '<label>Product Name</label><input type ="data" name="proName" value="'.$name.'">
								<br><br>';
								echo '<label>Product Price</label><input type ="text" name="proPrice" value="'.$price.'">
								<br><br>';
								echo '<label>Product Categories</label><input type ="text" name="proCategories" value="'.$categories.'">
								<br><br>';
								echo '<label>Product Description</label><input type ="text" name="proDescription" value="'.$description.'">
								<br><br>';
								echo '<label>Upload Image</label><select id="imageSelect" name="imgSelect">';
									foreach(glob('img/product/*[.jpg, .PNG, .jpeg]') as $filename){
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
