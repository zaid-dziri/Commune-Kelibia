<?php
		session_start();
		include "../includes/dbconnect.php";

		$admin= $connect->prepare("SELECT * FROM user WHERE cin=? AND mdp=? ;");
		$admin->execute([$_POST['cin'],$_POST["password"]]);
		if ($admin->rowCount()) {
			$admin = $admin->fetch();
			$_SESSION['user'] = $admin;
			header('Location: ../client.php');
		}else{
			header('Location: ../auth_login.php?Error=1');
		}
?>