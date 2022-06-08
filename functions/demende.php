<?php
	session_start();
	include "../includes/dbconnect.php";
	include "../includes/molo.php";

	echo $_POST['type'];
	if ($_POST['type']=='Normal') {
		$type='شخص طبيعي';
		$typeInt=1;
	}else{
		$type='شخص معنوي';
		$typeInt=2;
	}

	$user= $connect->prepare("INSERT INTO `demende`(`type`, `adresse`, `tel`, `fax`, `email`, `nom`, `information`, `departement`, `marjaa`, `note`, `type_reponse`) VALUES (?,?,?,?,?,?,?,?,?,?,?); ");
	$user->execute([
		$type,
		$_POST['adresse'.$typeInt],
		$_POST['tel'.$typeInt],
		$_POST['fax'.$typeInt],
		$_POST['email'.$typeInt],
		$_POST['nom'.$typeInt],
		$_POST['information'],
		$_POST['departement'],
		$_POST['marjaa'],
		$_POST['note'],
		$_POST['customRadio']
	]);

		if( $user->rowCount() > 0 ){
			header('Location: ../client.php?demende=1');
		}else{
			header('Location: ../index.php');
		}
?>