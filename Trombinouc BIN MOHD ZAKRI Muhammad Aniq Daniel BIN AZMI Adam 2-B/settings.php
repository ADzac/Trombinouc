<?php
		session_start();
        include("base.php");
        include("includes/function-inc.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style-1.css" />
		<link rel = "icon" href ="trom.png" type = "image/x-icon">
		<script src="https://kit.fontawesome.com/63bfda395d.js" crossorigin="anonymous"></script>
		<title>Trombinouc</title>
	</head>
	<body class="wrapper">

		<nav class="nav">
			<a href="acceuil.php">Trombinouc</a>
			<a href="logout.php">Log Out</a>
		</nav>
	

<?php
			echo "<section class='sidebar'>";	
			echo "<h2>My Profile</h2>";
			echo		"<div class='picture'>";
			if(empty($_SESSION['img'])){
				echo "<img alt='Profil' src='unknown.jpg'
					width='140' height='100'>";
					echo "</br>";
				}
			else{
					echo "<img alt='Profil' src='./includes/Gallery/{$_SESSION['img']}'
					width='140' height='100'>";
					echo "</br>";
				}
			echo		"</div>";
			if(isset($_SESSION['name'])){
				echo "<h4><i class='fas fa-user'></i>: ".$_SESSION['name'];
				echo "<h4><i class='fas fa-birthday-cake'></i>:" .$_SESSION['date'];
				echo "<h4><i class='fas fa-at'></i>:".$_SESSION['email'];
			}
			echo "</br>";
				echo "<a href='friends.php'><i class='fas fa-users'></i>     Friend List</a>";
				echo "</br>";
				echo "<a href='includes/Gallery/index_img.php'><i class='fas fa-image'></i>     Gallery</a>";
			
		echo "</section>";
		
			
		
?>		
		<section class="main">
                <h2>Settings</h2>
<?php		

			echo "<div class='post'>";
				echo "<form method='POST' action='includes/Gallery/picture-inc.php' enctype='multipart/form-data'>";
				  echo "<span class='file-name'>";
				  echo "<label>Change your profil picture</label>";
				  echo "</span>";
				  echo "<p>";
				  echo "<input type='file' name='picture'>";
				  echo "<input type='submit' value='Change photo' name='submit'>";
				  echo "</p>";
				echo "</form>";
			echo "</div>";
					
?>
			</div>
		</section>
		
	</body>
</html>

