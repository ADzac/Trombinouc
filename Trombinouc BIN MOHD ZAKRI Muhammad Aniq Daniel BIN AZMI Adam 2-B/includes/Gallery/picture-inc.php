<?php
session_start();
include("../../base.php");
include("../function-inc.php");
				$target_dir = ".";
				debug($target_dir);
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$img=basename($_FILES["fileToUpload"]["name"]);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				  if($check !== false) {
					
					$uploadOk = 1;
				  } else {
					echo "Not a photo.";
					$uploadOk = 0;
				  }
				}

				// Check if file already exists
				if (file_exists($target_file)) {
					header("location:index_mg.php?msg=failed");
				  $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 10000000) {
					header("location:index_img.php?msg=failed");
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					header("location:index_img.php?msg=failed");
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					header("location:index_img.php?msg=failed");
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						$sql="INSERT INTO GALERIE (img) VALUES ('{$img}')";
						$req= $bd->prepare($sql);
						$req->execute();
						$lesEnreg=$req->fetchall();
						$req->closeCursor();
						header("location:index_img.php?msg=uploaded");
				}
			}
		

?>

