<?php
	session_start();
	include "../includes/dbconnect.php";
	include "../includes/molo.php";

	echo $fichier= molo_uploadPicture('fichier','../fichiers/');

	$user= $connect->prepare("INSERT INTO `reponse`(`user`, `admin`, `sujet`, `fichier`, `message`) VALUES (?,?,?,?,?); ");
	$user->execute([
		$_POST['to'],
		$_POST['from'],
		$_POST['sujet'],
		$fichier,
		$_POST['message']
	]);

		if( $user->rowCount() > 0 ){
			header('Location: ../index.php?reponse=1');
		}else{
			header('Location: ../index.php');
		}
?>