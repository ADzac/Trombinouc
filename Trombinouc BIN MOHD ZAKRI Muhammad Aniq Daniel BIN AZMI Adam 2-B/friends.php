<?php
	session_start();
	if($_SESSION['verified']!=true){
		header('location:index.php?msg=err');
		exit();
	}
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
				echo "<a href='settings.php'><i class='fas fa-user-cog' ></i>Edit Profile</a>";
			echo		"</div>";
			if(isset($_SESSION['name'])){
				echo "<h4><i class='fas fa-user'></i>: ".$_SESSION['name']."</h4>";
				echo "<h4><i class='fas fa-birthday-cake'></i>:" .$_SESSION['date']."</h4>";
				echo "<h4><i class='fas fa-at'></i>:".$_SESSION['email']."</h4>";
			}
			echo "</br>";
				echo "<h4><a href='./includes/Gallery/index_img.php'><i class='fas fa-image'></i>Gallery</a></h4>";
			
		echo "</section>";
			
		?>		
		
		<section class="main">
			<h2>My Friends</h2>
			<div class="searchBar">
<?php
				echo "<form method='POST' action='includes/friends-inc.php'>";
					echo "<input type='text' name='username' placeholder='Add a friend! (Enter a username)'>";
					echo "<button type='submit' name='submit'>Add Friend</button>";
				echo "</form>";
					if($_GET["msg"]=="empty"){
						echo "<p>Please enter a username!</p>";
					}
					if($_GET["msg"]=="usrNotFound"){
						echo "<p>Username not found!</p>";
					}
					if($_GET["msg"]=="friendAlreadyAdded"){
						echo "<p>Friend is already added!</p>";
					}
					if($_GET["msg"]=="friendAdded"){
						echo "<p>Friend successfully added!</p>";
					}
					if($_GET["msg"]=="send"){
						echo "<p>Email successfully sent!</p>";
					}
					if($_GET["msg"]=="wish"){
						echo "<p>Birthday successfully wished!</p>";
					}
					

			echo "</div>";
				$Uid=$_SESSION['id'];
				include("includes/function-inc.php");
				include("base.php");
				$sql = "SELECT Name,id,Username FROM SINSCRIRE INNER JOIN FRIENDS ON id=friendUid WHERE Uid='{$Uid}' ";
				$req = $bd->prepare($sql);
				$req->execute();
				$lesEnreg = $req->fetchall();
				$req->closeCursor();
				foreach($lesEnreg as $i){
					
					echo "<section class='box-1'>";
					echo "<div class='pinkTxt'>@$i[Username]</div>";
					echo "<div>$i[Name]</div>";
					$people=trim($_SESSION['name']);
					$admin="Daniel";

					$sql_h = "SELECT * FROM ACCESS INNER JOIN FRIENDS ON friendId=accessFriend INNER JOIN SINSCRIRE ON id=friendUid WHERE id='{$i[id]}' ";
					$req_h = $bd->prepare($sql_h);
					$req_h->execute();
					$lesEnreg_h = $req_h->fetchall();
					$req_h->closeCursor();
					if($people==$admin){
					if(empty($lesEnreg_h)){
						echo "<div>";
						echo "<form method='POST' action='includes/friends-inc.php'>";
						echo "<button type='submit' name='giveAccess' value='{$i[id]}'>Permit</button>";
						echo "</form></div>";
					}
					
					else{
						echo "<div>";
						echo "<form method='POST' action='includes/friends-inc.php'>";
						echo "<button type='submit' name='denyAccess' value='{$i[id]}'>Deny</button>";
						echo "</form>";
						echo "</div>";
					}
	}
					
					echo "<div>";
					echo "<form method='POST' action='includes/friends-inc.php'>";
					echo "<button type='submit' name='unfriend' value='{$i[id]}'>Unfriend</button>";
					echo "</form>";
					echo "</div>";
					echo "<div>";
					echo "<form method='POST' action='includes/friends-inc.php'>";
					echo "<button type='submit' name='birth' value='{$i[id]}'>Happy Birthday</button>";
					echo "</form>";
					echo "</div>";
					echo "<div>";
					echo "<form method='POST' action='includes/friends-inc.php'>";
					echo "<textarea name='email' placeholder='Write your e-mail....' required></textarea><br>";
					echo "<button type='submit' name='mail' value='{$i[id]}'>Send an e-mail</button>";
					echo "</form>";
					echo "</div>";
					echo "</section>";
			}

			?>
		</section>
		<footer class="footer">Footer</footer>
	</body>
</html>
