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
			<div><a href="admin.php">Pages</a></div>
			<div><a href="_tour_admin.php">Tour Schedlue</a></div>
			<div><a href="_news_admin.php">News</a></div>
			<div><a href="info.php">Info</a></div>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
				<input type="submit" name="logOut" value="Log Out">
			</form>
		</div>

		<!-- main dashboard -->
		<div class="formDiv">
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
						echo "<div class='allBlogs'>";

						$query = "SELECT * FROM info_tb";
						$queryResult = mysqli_query(db_connect(), $query);

						$numberOfRows = mysqli_num_rows($queryResult);

						if($numberOfRows >= 0) {
							while( $rowArray = mysqli_fetch_assoc($queryResult)){
								$id = $rowArray["id"];
								$username = $rowArray["username"];
								$password = $rowArray["password"];
								$act = htmlentities($_SERVER['PHP_SELF']);

								echo 		"<form action='".$act."' method='POST'>";
								echo 		"<label>Username</label><input type='name' name='newName' value='".$username."'><br><br>";
								echo 		"<label>Password</label><input type='name' name='newPassword' value='".$password."'><br><br>";
								echo 		"<input type='submit' name='changeInfo' value='Update Info'>";
								echo "</form>";
							}// close while
						}// close if statement
						echo "</div>";

						if(isset($_POST['changeInfo'])) {
							$newName = mysqli_real_escape_string(db_connect(), $_POST['newName']);
							$newPass = mysqli_real_escape_string(db_connect(), $_POST['newPassword']);
							$update = "UPDATE info_tb SET username = '".$newName."', password =  '".$newPass."' WHERE id = 0";

							$updateResult = mysqli_query(db_connect(), $update);

							if($updateResult) {
								echo "<script>window.location = 'info.php';</script>";
							}
							else {
								echo "<p>Update Failed</p>";

							}
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
