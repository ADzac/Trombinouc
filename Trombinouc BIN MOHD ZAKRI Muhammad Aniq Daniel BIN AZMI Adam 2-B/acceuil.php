<?php
		if(!isset($_SESSION['name']) && !isset($_SESSION['pwd'])){
		session_start();
        include("base.php");
        include("includes/function-inc.php");
        if (isset($_POST['username']) && isset($_POST['password'])){
		$username=$_POST['username'];
	    $password=$_POST['password'];
		$sql_u="SELECT * FROM SINSCRIRE WHERE Username = '{$username}' AND password = '{$password}' ";
		$req_u=$bd->prepare($sql_u);
		$req_u->execute();
		$lesEnreg_u = $req_u -> fetchAll();
		$req_u->closeCursor();
		if(empty($lesEnreg_u)){
			$_SESSION['verified']=false;
			header('Location:index.php?msg=err');
			exit();
		}
		else{
			$_SESSION['verified']=true;
			$_SESSION['name']=$_POST['username'];
			$_SESSION['pwd']=$_POST['password'];
			$_SESSION['id']=$lesEnreg_u[0][id];
			$_SESSION['date']=$lesEnreg_u[0][Birthdate];
			$_SESSION['email']=$lesEnreg_u[0][Email];
			$_SESSION['img']=$lesEnreg_u[0][img];
		}
	}
}		header('Content-Type: text/html; charset=ISO-8859-1');
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
			<a>Trombinouc</a>
			<a href="logout.php">Log Out</a>
		</nav>
	

<?php
	$people=$_SESSION['name'];
	$admin="Daniel";
	$length=strlen($people);
	$admin=strlen($admin);
	$admin=$admin+1;
	$sql34 = "SELECT * FROM ACCESS INNER JOIN FRIENDS ON friendId=accessFriend INNER JOIN SINSCRIRE ON id=friendUid WHERE Username='{$_SESSION['name']}'"; 
	$req34 = $bd->prepare($sql34);
	$req34->execute();
	$lesEnreg34 = $req34->fetchall();
	$req34->closeCursor();
	if (!empty($lesEnreg34)){
		$access=true;
	}
	else {
		$access=false;
	}
			echo "<section class='sidebar'>";	
			echo "<h2>My Profile</h2>";
			echo		"<div class='picture'>";
			$img=strlen($_SESSION['img']);
			if($img!=0){
					echo "<img alt='Profil' src='./includes/Gallery/{$_SESSION['img']}' width='140' height='100'>";
					echo "</br>";
				}
			else{	
					echo "<img alt='Profil' src='unknown.jpg' width='140' height='100'>";
					echo "</br>";
					
				}
				echo "<a href='settings.php'><i class='fas fa-user-cog' ></i>Edit Profile</a>";
			echo		"</div>";
			if(isset($_SESSION['name'])){
				echo "<h4><i class='fas fa-user'></i>: ".$_SESSION['name'];
				echo "</br>";
				echo "<i class='fas fa-birthday-cake'></i>:" .$_SESSION['date'];
				echo "</br>";
				echo "<i class='fas fa-at'></i>:".$_SESSION['email'];
			}
			echo "</br>";
				echo "<a href='friends.php'><i class='fas fa-users'></i> Friend List</a>";
				echo "</br>";
				echo "<a href='./includes/Gallery/index_img.php'><i class='fas fa-image'></i>Gallery</a>";
			
		echo "</section>";
		
?>		
		<section class="main">
                <h2>Feed</h2>
<?php		
			if($access==true){
			echo "<div class='post'>";
				echo "<form method='POST' action='includes/status.php'>";
					echo "<label>Add Post:</label><br>";
					echo "<textarea name='status' placeholder='Write your post....' required></textarea>";
					echo "<button name='usr' type='submit' value= '{$_SESSION['name']}'>Post</button>";
				echo "</form>";
			echo "</div>";
		}
			include("base.php");
			$sql22 = "SELECT Name,post,date,postid,id FROM STATUS INNER JOIN SINSCRIRE ON id=uid ORDER BY date desc";
			$req22 = $bd->prepare($sql22);
			$req22->execute();
			$lesEnreg22 = $req22->fetchall();
			$req22->closeCursor();

			foreach($lesEnreg22 as $i){
				echo "<div class='box-2'>";
				echo "<p class='pinkTxt'>$i[Name]</p>";
				echo "<p>$i[post]</p>";
				echo "<p>$i[date]</p>";
				
				if($access==true){
					echo "<div class='box-3'>";
					echo "<form method='POST' action='includes/status.php'>";
					echo "<textarea name='comment' placeholder='Write your comment....' required></textarea>";
					echo "<button name='post' type='submit' value='{$i[postid]}'>Comment</button>";
					echo "</form>";
				}
				include("base.php");
				$sql33 = "SELECT Name,commentText,commentTime FROM COMMENT INNER JOIN STATUS ON postid=commentPost INNER JOIN SINSCRIRE ON id=userid WHERE postid='{$i[postid]}'";
				$req33 = $bd->prepare($sql33);
				$req33->execute();
				$lesEnreg33 = $req33->fetchall();
				$req33->closeCursor();
					
					foreach($lesEnreg33 as $k){
						echo "<div class='box-2'>";
						echo "<p class='pinkTxt'>$k[Name]</p>";
						echo "<p>$k[commentText]</p>";
						echo "<p>$k[commentTime]</p>";
						echo "</div>";
						
					}
				echo "</div>";
				echo "</div>";
					
				}
?>
			</div>
			
		
			
		</section>
		
	</body>
</html>
