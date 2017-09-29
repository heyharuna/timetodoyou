<?php include "partials/_logOut.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
  <link href="module/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="module/css/style.css" media="all" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
</head>
<body>
	<div class="cmsPage">
		<!-- side menu bar -->

		<div class="menuBar" role="menu">
			<div><a href="admin.php">Home</a></div>
			<div><a href="_tour_admin.php">All Schedule</a></div>
			<div><a href="_insertTour.php">Create</a></div>
			<div><a href="_uploadPoster.php">Upload Poster</a></div>
			<div><a href="info.php">Info</a></div>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
				<input type="submit" name="logOut" value="Log Out">
			</form>
		</div>

		<!-- main dashboard -->
		<div class="formDiv">
			<?php
			include "db.php";
			db_connect();
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);


					if(!db_connect()){
						die("<p>Connection failed because".mysqli_connect_error()."</p>");
					}
					else {
						mysqli_set_charset(db_connect(), "utf-8");
						echo "<p style='color: #F45D4C;'>CONNECTED</p>";
						echo "<div class='allBlogs'>";

						//table 1
						////////////////////////////
						$query = "SELECT * FROM tour_tb";
						$queryResult = mysqli_query(db_connect(), $query);

						$numberOfRows = mysqli_num_rows($queryResult);

						 if($numberOfRows > 0) {

						 	echo "<h1>Tour Schedule</h1>";
                  while( $rowArray = mysqli_fetch_assoc($queryResult)){
                      // An associative array is created for every row in the table
                      // The column name becomes the key for each value
                      $id = $rowArray["id"];
                      $date = $rowArray["date"];
                      $nation = $rowArray["nation"];
                      $state = $rowArray["state"];
                      $venue = $rowArray["venue"];
                      $img = $rowArray["img"];

											echo "<div class='oneBlog'>";
			                echo    "<div class='blogImg'><img src='../" . $img. "' name='thisImage'></div>";
											echo 		"<div class='contentSec'>";
			                echo			"<div class='blogData'><p>date: </p><h3>".$date."</h3></div>";
											 echo			"<div class='blogTitle'><p>Country: </p><h2>".$nation."</h2></div>";
											 echo			"<div class='blogTitle'><p>State: </p><h2>".$state."</h2></div>";
											 echo			"<div class='blogTitle'><p>Venue: </p><h2>".$venue."</h2></div>";
											echo  	"</div>";
											echo 		"<div class='changeBtn'>";
											echo 		"<div class='btnIcon'>";
			                echo 			"<div><a href='_edit.php?id=".$id."&tb=tour_tb'><img src='module/source_img/edit.png' alt='edit'></a></div>";
			                echo 			"<div><a href='partials/_delete_process.php?id=".$id."'&tb=tour_tb'><img src='module/source_img/delete.png'></a></div>";
											echo 		"</div>";
											echo  	"</div>";
			                echo "</div>";

                  }
              }
              else {
                  // The table is empty
                  echo "<p>No data found.</p>";
              }

					// close
					db_close(db_connect());
					}
			?>
		</div>



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="module/js/bootstrap.min.js"></script>
    <script src="module/js/main.js"></script>
</body>
</html>
