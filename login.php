<?php
session_start();
include "db_conn.php";

if (isset($_POST['login']) && isset($_POST['password'])) {
	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$login = validate($_POST['login']);
	$pass = validate($_POST['password']);

	if (empty($login)) {
		header("Location: main.php?error_signin= Логин обязательный!");
		exit();
	}else if(empty($pass)) {
		header("Location: main.php?error_signin= Пароль обязательный!");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE login='$login'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($pass, $row['password'])) {
				$_SESSION['login'] = $row['login'];
				$_SESSION['id'] = $row['id'];
				header("Location: profile.html");
				exit();
			}else {
				header("Location: main.php?error_signin= Неверный логин или пароль");
				exit();
		    }
		}else {
			header("Location: main.php?error_signin= Неверный логин или пароль");
			exit();
		}
	}

}else {
	header("Location: main.php?error_signin");
	exit();
}