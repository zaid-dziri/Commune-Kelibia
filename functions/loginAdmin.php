<?php
		session_start();
		include "../includes/dbconnect.php";

		$admin= $connect->prepare("SELECT * FROM admin WHERE cin=? AND mdp=? ;");
		$admin->execute([$_POST['cin'],$_POST["password"]]);
		if ($admin->rowCount()) {
			$admin = $admin->fetch();
			$_SESSION['admin'] = $admin;
			header('Location: ../index.php');
		}else{
			header('Location: ../auth_login_admin.php?Error=1');
		}
?>