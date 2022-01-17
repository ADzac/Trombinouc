<?php
		session_start();
		include("function-inc.php");
		if(isset($_POST["status"])){
			include("../base.php");
			$d=date("d/m/y") ;
			$d.="\r\n";
			$d.=date("h:i:s") ;
			
			$sql_s="INSERT INTO STATUS (uid,post,date) VALUES ((SELECT id FROM SINSCRIRE WHERE Username=:username),:status,'{$d}')";
			$req_s=$bd->prepare($sql_s);
			$marquers=array('username'=>$_POST["usr"],'status'=>$_POST["status"]);
			$req_s->execute($marquers);
			$lesEnreg_s = $req_s -> fetchAll();
			$req_s->closeCursor();
			header('Location:../acceuil.php?msg=posted');
		}	
		
		if(isset($_POST["comment"])){
			$d2=date("d/m/y") ;
			$d2.="\r\n";
			$d2.=date("h:i:s") ;
		
		
			echo $pid;
			echo$usrName;
			echo $comment;
			echo $d2;
			include("../base.php");
			$sql_h = "INSERT INTO COMMENT (userid,commentPost,commentText,commentTime) VALUES ((SELECT id FROM SINSCRIRE where Username=:usrName),:pid ,:comment , '{$d2}')";
			$req_h = $bd->prepare($sql_h);
			$marquers_h=array('usrName'=>$_SESSION["name"],'pid'=>$_POST["post"],'comment'=>$_POST["comment"]);
			$req_h->execute($marquers_h);
			$lesEnreg_h = $req_h->fetchall();
			$req_h->closeCursor();
			header("location:../acceuil.php?msg=commented");
			
			
	}
?>
