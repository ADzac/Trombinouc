
<?php
	include("../base.php");
	include("function-inc.php");
		$name = $_POST['name'];
		$username = $_POST['username'];
		$date = $_POST['date'];
		$pwd = $_POST['pwd'];
		$repwd = $_POST['repwd'];
		$email = $_POST['email'];
		//Check for the length of the pwd
	if(strlen(trim($pwd)) < 8){
        header("Location:../sinscrire.php?msg=short");
		exit();
	} 
		//Check if pwd match or not
	else if($pwd !== $repwd){
			header("Location:../sinscrire.php?msg=pwd");
			exit();
		}
		//Check if some1 already used the username
	else if(!empty($_POST['username'])){
		$sql_u="SELECT Username FROM SINSCRIRE WHERE Username = '{$username}'";
		$req_u=$bd->prepare($sql_u);
		$req_u->execute();
		$lesEnreg_u = $req_u -> fetchAll();
		if(!empty($lesEnreg_u)){
			header("Location:../sinscrire.php?msg=user");
			exit();
	}
}
	else if(!empty($_POST['email'])){
		$sql_e="SELECT Email FROM SINSCRIRE WHERE Email = '{$email}'";
		$req_e=$bd->prepare($sql_e);
		$req_e->execute();
		$lesEnreg_e = $req_e -> fetchAll();
		if(!empty($lesEnreg_e)){
			header("Location:../sinscrire.php?msg=email");
			exit();
	}
}		
		$sql="INSERT INTO SINSCRIRE (Name,Username,Birthdate,Password,Email) VALUES ('{$name}','{$username}','{$date}','{$pwd}','{$email}')";
		$req=$bd->prepare($sql);
		$req->execute();
		$lesEnreg = $req -> fetchAll();
		$req -> closeCursor();
		header("Location:../index.php?msg=ok");
		exit();
?>

