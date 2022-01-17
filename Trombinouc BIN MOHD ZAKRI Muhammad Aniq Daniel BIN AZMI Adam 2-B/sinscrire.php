<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style-1.css" />
		<link rel = "icon" href ="trom.png" type = "image/x-icon">
		<title>TROMBINOUC</title>
	</head>
	<body class="wrapper">
		<nav class="nav">
		<a href="index.php">Trombinouc</a>
		</nav>
<?php
	include("./base.php");
?>		
	<section class="main">
		
		<div class="box-1">
			
				<form method="POST" action="includes/sinscrire2.php">
					<p>	
						<label for="name"></label>
						<input id="name" name="name" placeholder="Name"type="text" required autofocus/>
					</p>
					<p>	
						<label for="username"></label>
						<input id="username" name="username" placeholder="Username" type="text" required/>
					</p>
<?php
				if ($_GET['msg']=="user"){
				echo "<p>Username already exist</p>";
			 }
?>
				<p>	
					<label for="date">Birthdate</label>
					<input id="date" name="date" type="date" required />
				</p>
				<p>	
					<label for="pwd"></label>
					<input id="pwd" name="pwd" placeholder="Password" type="password" required />
				</p>
				<p>	
					<label for="repwd"></label>
					<input id="repwd" name="repwd" placeholder="Re-Password" type="password" required />
				</p>
<?php
				if ($_GET['msg']=="pwd"){
		        echo "<p><strong>Password must be the same</strong></p>";
	            }
	            if ($_GET['msg']=="short"){
		        echo "<p><strong>Password must be 8 characters long</strong></p>";
	            }
?>
				<p>	
					<label for="email"></label>
					<input id="email" name="email" placeholder="Email" type="email" value="<?php echo (isset($_POST['email']))?$_POST['email']:'';?>" required/>
				</p>
<?php
				if ($_GET['msg']=="email"){
		        echo "<p><strong>Email already used</strong></p>";
	            }
?>
				<p>	
					<button id="envoi" name="envoi" type="submit" value="envoi">Let's Go</button> 
				</p>
				
				</form>
			</div>
		
	</section>
	</body>
</html>

