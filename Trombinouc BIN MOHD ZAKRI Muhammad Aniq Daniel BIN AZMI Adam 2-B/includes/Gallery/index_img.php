<?php
		session_start();
		if($_SESSION['verified']!=true){
		header('location:index.php?msg=err');
					exit();
	    }
        include("../../base.php");
        include("../function-inc.php");
        header('Content-Type: text/html; charset=ISO-8859-1');
?>
	

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../style-1.css" />
		<script src="https://kit.fontawesome.com/63bfda395d.js" crossorigin="anonymous"></script>
		<link rel = "icon" href ="../../trom.png" type = "image/x-icon">
		<title>Trombinouc</title>
	</head>
	<body class="wrapper">

		<nav class="nav">
			<a href="../../acceuil.php">Trombinouc</a>
			<a href="../../logout.php">Log Out</a>
		</nav>
<?php
			echo "<section class='sidebar'>";	
			echo "<h2>My Profile</h2>";
			echo		"<div class='picture'>";
			if(empty($_SESSION['img'])){
				echo "<img alt='Profil' src='../../unknown.jpg'
					width='140' height='100'>";
					echo "</br>";
				}
			else{
					echo "<img alt='Profil' src='./{$_SESSION['img']}'
					width='140' height='100'>";
					echo "</br>";
				}
				echo "<a href='../../settings.php'><i class='fas fa-user-cog' ></i>Edit Profile</a>";
			echo		"</div>";
			if(isset($_SESSION['name'])){
				echo "<h4><i class='fas fa-user'></i>: ".$_SESSION['name']."</h4>";
				echo "<h4><i class='fas fa-birthday-cake'></i>:" .$_SESSION['date']."</h4>";
				echo "<h4><i class='fas fa-at'></i>:".$_SESSION['email']."</h4>";
			}
			echo "</br>";
				echo "<h4><a href='../../friends.php'><i class='fas fa-users'></i> Friend List</a></h4>";
			
		echo "</section>";
		echo "<section class='main'>";
			echo "<h2>Gallery</h2>";
			echo "<div class='post'>";
			$people=$_SESSION['name'];
			$admin="Daniel";
			$length=strlen($people);
			$admin=strlen($admin);
			$admin=$admin+1;
			if($length==$admin){
					echo "<form method='POST' action='picture-inc.php' enctype='multipart/form-data'>";
						echo " <span class='file-name'></span>";
						echo "<label>Upload a picture</label>";
						echo "<p>";
							echo " <input type='file' name='fileToUpload'>";
							echo "<input type='submit' value='UploadImage' name='submit'>";
						echo "</p>";
					echo "</form>";
			echo "</div>";
	}
			$dirname = "./";
			$images = dirToArray($dirname);
			$sql = "SELECT * FROM GALERIE";
			$req = $bd->prepare($sql);
			$req->execute();
			$lesEnreg = $req->fetchall();
			$req->closeCursor();
			echo "<table style='width:100%'>";
			$int=count($lesEnreg);
			for($j=0;$j<$int;$j++){
				$img=$lesEnreg[$j][img];
					echo "<tr>";
						echo "<td>";
						echo "<img src='{$img}' width='250' height='100' /><br>\n";
						echo "</td>";
					echo "</tr>";
}

?>			
			
		</section>
		
	</body>
</html>
