 <?php
	session_start();
	if (isset($_POST['upload'])) {
  	$image = $_POST['upload'];
  	
  	$sql_i = "INSERT INTO GALERIE (image) VALUES ('{$image}')";
	$req_i=$bd->prepare($sql_i);
	$req_i->execute();
	$lesEnreg_i = $req_i -> fetchAll();
	header('Location:../acceuil.php?msg=posted');
	exit();
}

?>
