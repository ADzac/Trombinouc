<?php
	session_start();
	if (!isset($_POST["submit"]) && !isset($_POST["giveAccess"]) && !isset($_POST["denyAccess"]) && !isset($_POST["unfriend"]) && !isset($_POST["mail"]) && !isset($_POST["birth"])){
		header("location:../friends.php?msg=err");
	}
	else{
	include("function-inc.php");
	
	if (isset($_POST["submit"])){	
		if(empty($_POST["username"])){
		header("location:../friends.php?msg=empty");
		exit();	
		}
		
		$username = $_POST["username"];
		$Uid=$_SESSION['id'];
		include("../base.php");
		$sql = "SELECT id FROM SINSCRIRE WHERE Username='{$username}'";
		$req = $bd->prepare($sql);
		$req->execute();
		$lesEnreg = $req->fetchall();
		$req->closeCursor();
		if(empty($lesEnreg)){
			header("location:../friends.php?msg=usrNotFound");
			exit();
		}
		$friendId=$lesEnreg[0][0];
		
		include("../base.php");
		$sql1 = "SELECT * FROM FRIENDS INNER JOIN SINSCRIRE on id=Uid WHERE friendUid='{$friendId}' AND Uid='{$Uid}' ";
		$req1 = $bd->prepare($sql1);
		$req1->execute();
		$lesEnreg1 = $req1->fetchall();
		$req1->closeCursor();
		
		if(!empty($lesEnreg1)){
			header("location:../friends.php?msg=friendAlreadyAdded");
			exit();
		}
		include("../base.php");
		$Uid=$_SESSION['id'];
		$sql2 = "INSERT INTO FRIENDS (Uid,friendUid) VALUES ('{$Uid}', '{$friendId}')"; 
		$req2 = $bd->prepare($sql2);
		$req2->execute();
		$lesEnreg2 = $req2->fetchall();
		$req2->closeCursor();
		include("../base.php");
		$sql3 = "INSERT INTO ACCESS (accessFriend) SELECT friendId FROM FRIENDS WHERE friendUid='{$friendId}'"; 
		$req3 = $bd->prepare($sql3);
		$req3->execute();
		$lesEnreg3 = $req3->fetchall();
		$req3->closeCursor();
		header("location:../friends.php?msg=friendAdded");	
		
	}
	
	
	
	if (isset($_POST["denyAccess"])){
		$uid = $_POST["denyAccess"];
		include("../base.php");
		$sql_h = "DELETE ACCESS FROM ACCESS INNER JOIN FRIENDS ON friendId=accessFriend INNER JOIN SINSCRIRE ON id=friendUid WHERE id='{$uid}'";
		$req_h = $bd->prepare($sql_h);
		$req_h->execute();
		$lesEnreg_h = $req_h->fetchall();
		$req_h->closeCursor();
		header("location:../friends.php?msg=denied");
	}
	
	if (isset($_POST["giveAccess"])){
		$uid = $_POST["giveAccess"];
		include("../base.php");
		$sql_h = "INSERT INTO ACCESS (accessFriend) SELECT friendId FROM FRIENDS WHERE friendUid='{$uid}'";
		$req_h = $bd->prepare($sql_h);
		$req_h->execute();
		$lesEnreg_h = $req_h->fetchall();
		$req_h->closeCursor();
		header("location:../friends.php?msg=permitted");
	}
	
	if (isset($_POST["unfriend"])){
		$uid = $_POST["unfriend"];
		$id=$_SESSION['id'];
		include("../base.php");
		$sql_h = "DELETE FRIENDS FROM FRIENDS INNER JOIN SINSCRIRE ON id=friendUid WHERE friendUid='{$uid}' AND  Uid='{$id}'";
		$req_h = $bd->prepare($sql_h);
		$req_h->execute();
		$lesEnreg_h = $req_h->fetchall();
		$req_h->closeCursor();
		header("location:../friends.php?msg=unfriended");
	}
	
	
	if (isset($_POST["mail"])){
		$uid = $_POST["mail"];
		$mail= $_POST["email"];
		include("../base.php");
		include("function-inc.php");
		$sql_m = "SELECT Email FROM SINSCRIRE WHERE id= '{$uid}'";
		$req_m= $bd->prepare($sql_m);
		$req_m->execute();
		$lesEnreg_m = $req_m->fetchall();
		$req_m->closeCursor();
		$to='{$lesEnreg_m[0][Email]}';
		$subject = 'Trombinouc';
		$from = '{$lesEnreg[0][Email]}';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$message = '<html><body>';
		$message .= '<h1 style="color:#f40;">.$mail.</h1>';
		$message .= '</body></html>';
		mail($to, $subject, $message, $headers);
		if(mail($to, $subject, $message, $headers)==true){
		header("location:../friends.php?msg=send");
		exit();
		}
		else{
		header("location:../friends.php?msg=fail")
	}
	}
		if (isset($_POST["birth"])){
		$uid = $_POST["birth"];
		include("../base.php");
		include("function-inc.php");
		$sql_b = "SELECT Birthdate FROM SINSCRIRE WHERE id= '{$uid}'";
		$req_b= $bd->prepare($sql_b);
		$req_b->execute();
		$lesEnreg_b = $req_b->fetchall();
		$req_b->closeCursor();
		$to='{$lesEnreg_b[0][Email]}';
		$subject = 'Birthday';
		$from = '{$lesEnreg[0][Email]}';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$message = '<html><body>';
		$message .= '<h1 style="color:#f40;">Happy Birthday!!</h1>';
		$message .= '</body></html>';
		mail($to, $subject, $message, $headers);
		if(mail($to, $subject, $message, $headers)==true){
		header("location:../friends.php?msg=wish");
		exit();
		}
		else{
		header("location:../friends.php?msg=fail");
	}
}
}
	
	
?>
