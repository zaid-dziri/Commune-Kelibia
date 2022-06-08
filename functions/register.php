<?php
	session_start();
	include "../includes/dbconnect.php";

	$user= $connect->prepare("INSERT INTO `user`(`cin`, `nom`, `email`, `mdp`, `tel`, `adresse`) VALUES (?,?,?,?,?,?); ");
	$user->execute([
		$_POST['identificator'],
		$_POST['full-name'],
		$_POST['email'],
		$_POST['password'],
		$_POST['tel'],
		$_POST['adresse']
	]);

	$_SESSION['user']= array(
							  "nom"=> $_POST['full-name'],
							  "email"=> $_POST['email'],
							  "cin"=> $_POST['identificator'],
							  "mdp"=> $_POST['password'],
							  "tel"=> $_POST['tel'],
							  "adresse"=> $_POST['adresse']
								);
		if( $user->rowCount() > 0 ){
			header('Location: ../client.php');
		}else{
			header('Location: ../index.php');
		}
?>