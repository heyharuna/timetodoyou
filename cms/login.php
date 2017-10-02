<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<style>
			body {
				padding:20px;
				background:##BF9BD6;
				font-family:"Lato", "san-serif";
			}
			h1 {
				text-align:center;
			}
			p {
				width:500px; margin:auto;
			}
		</style>
	</head>
	<body>
		<h1>Log In Page</h1>
		<p>Please type your Username and Password into the box to log into your User Page.</p>

		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<input name="uName" placeholder="Username">
			<input name="pWord" placeholder="Password">

			<br><br>

			<input name="submit" type="submit" value="Log In">

			<br>
		</form>

		<?php
            include "db.php";
            db_connect();

            if(!db_connect()){
              die("<p>Connection failed because".mysqli_connect_error()."</p>");
            }
            else {
              mysqli_set_charset(db_connect(), "utf-8");
        			if(isset($_POST["submit"])) {
        				mysqli_set_charset(db_connect(), "utf-8");

        				$username = mysqli_real_escape_string(db_connect(), $_POST["uName"]);
        				$password = mysqli_real_escape_string(db_connect(), $_POST["pWord"]);

        				$query = "SELECT * FROM info_tb
        							WHERE password = '".$password."'
        							AND username = '".$username."'";

        				$queryResult = mysqli_query(db_connect(), $query);

        				$numRows = mysqli_num_rows($queryResult);

        				if($numRows == 1) {
        					$_SESSION["username"] = $username;
        					echo "<script>location.replace('admin.php')</script>";
        				}
        				else {
        					echo "<p>Username or Password is invalid</p>";
        				}
        			}
        			// end connect to aql
        			mysqli_close(db_connect());
        		}


		?>
	</body>
</html>
