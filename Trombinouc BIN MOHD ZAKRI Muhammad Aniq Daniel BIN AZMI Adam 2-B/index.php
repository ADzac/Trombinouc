<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style-1.css" />
		<link rel = "icon" href ="trom.png" type = "image/x-icon">
		<title>Trombinouc</title>
	</head>
	<body class="wrapper">
		<nav class="nav">
			<h1>Trombinouc</h1>
		</nav>
<?php
	include("./base.php");
?>			
		<section class="main">
			<div class="box-1">
				<form method="POST" action="acceuil.php">
					
<?php
		if ($_GET['msg']=="err"){
		echo "<p><strong>Username and password doesn't match</strong></p>";
	}
	if ($_GET['msg']=="ok"){
		echo "<p><strong>Welcome to Trombinouc</strong></p>";
	}
		if ($_GET['msg']=="dec"){
		echo "<p><strong>You have log out</strong></p>";
	}
?>
					<p>	
						<label for="user"></label>
						<input id="username" name="username" type="text"  placeholder="Username" required autofocus/>
					</p>
					<p>	
						<label for="mdp"></label>
						<input id="password" name="password" type="password" placeholder="Password" required/>
					</p>
					<p><button id="envoi" name="envoi" type="submit" value="envoi">Log In</button></p>
						
					
					
				</form>
			</div>
			<div class="box-1">
				<form method="POST" action="sinscrire.php">
					<p>Don't have an account yet?</p>
					<p><button type="submit" value="sins">Sign Up</button></p>
				</form>
			</div>
		</section>
		
	</body>
</html>
