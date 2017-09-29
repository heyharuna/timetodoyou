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
  <div class="cmsPage uploadImagePage">
		<div class="menuBar" role="menu">
			<div><a href="admin.php">Home</a></div>
			<div><a href="_news_admin.php">All Articles</a></div>
			<div><a href="_insertArticle.php">Create</a></div>
			<div><a href="_uploadImage.php">Upload Image</a></div>
			<div><a href="info.php">Info</a></div>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
				<input type="submit" name="logOut" value="Log Out">
			</form>
		</div>
    <div class="formDiv">
  		<div class="imageDir">
				<h1>Image</h1>
  			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
  				<p class="selectPara">Select image to upload</p>
					<input type="file" name="imageToFile" class="chooseImgBtn" id="file">
					<label for="file">Choose a file</label>
  				<input type="submit" name="uploadImage" value="Upload Image" class="uploadImgBtn">
  			</form>

				<div id="showAllPhoto">
					<?php
					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					include "db.php";
  				db_connect();
						foreach(glob('img/news/*[.jpg, .PNG]') as $filename){
								echo "<div><img src='".$filename."'></div>";
						}
					?>
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

  					if(isset($_POST['uploadImage'])) {
  						//upload Image to 'img'Directory
  						$targetDirectory = "img/news/";
              $targetFile = $targetDirectory.basename($_FILES['imageToFile']['name']);
              $upload_passed = true;


              // Check if file is an image
              //==========================
  				    $isImage = getimagesize($_FILES["imageToFile"]["tmp_name"]);

  				    if($isImage !== false) {
  				        //echo "<p>File is an image</p>";
  				    }
  				    else {
  				        //echo "<p>FAILED - File is not an image.</p>";
  				        $upload_passed = false;
  				    }

              // Check if file already exists
              //=============================
    					if (file_exists($targetFile)) {
    					    //echo "<p>FAILED - File already exists.</p>";
    					    $upload_passed = false;
    					}
    					else {
    						//echo "<p>File does not already exist on directory.</p>";
    					}

              // Check file size
              //=============================
    					if ($_FILES["imageToFile"]["size"] > 1000000) {
    					    //echo "<p>FAILED - Your image is too large.</p>";
    					    $upload_passed = false;
    					}
    					else {
    						//echo "<p>File is correct size.</p>";
    					}

              // Allow certain file formats ''
              //=============================
    					$imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    					if($imageFileType === "jpg" || $imageFileType === "png" || $imageFileType === "jpeg" || $imageFileType === "JPG") {
    					    //echo "<p>File has correct extension.</p>";
    					}
    					else {
    						//echo "<p>FAILED - Image was not JPG, JPEG or PNG.</p>";
    					    $upload_passed = false;
    					}

              // Final Test
              // Check if file will be uploaded
              //==============================
              if ($upload_passed === false) {
    					    echo "<p>FILE NOT UPLOADED - Failed tests.</p>";
                  var_dump($upload_passed);
    					}
    					else {
    						// If everything is ok, try to upload file
    						echo "<p>File has uploaded.</p>";

    					    if (move_uploaded_file($_FILES["imageToFile"]["tmp_name"], $targetFile)) {
    					        echo "<p>The file ". basename( $_FILES["imageToFile"]["name"]). " has been uploaded.</p>";
											echo "<script>window.location = '_uploadImage.php';</script>";
    					        //echo "<img src='" . $targetFile . "'>";
    					    }
    					    else {
    					        echo "<h1>IMAGE UPLOAD FAILED.</h1>";
    					    }
    					}
    				}
    				else {
    					// Error during file upload
    					// echo "<p>Upload error " . $_FILES['imageToFile']['error'] . " has occurred!</p>";
    				}
  					// when click submittBtn to upload Image
  				}


  		?>
    </div>
  </div>
</body>
</html>
