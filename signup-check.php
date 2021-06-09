<?php
include "db_conn.php";

$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    header("Location: main.php?error_signup= Недопустимая длина логина!");
    exit();
} else if(mb_strlen($email) < 6 || mb_strlen($email) > 250) {
    header("Location: main.php?error_signup= Недопустимая длина email!");
    exit();
} else if(mb_strlen($password) < 6 || mb_strlen($password) > 20) {
    header("Location: main.php?error_signup= Недопустимая длина пароля! (от 6 до 20 символов)");
    exit();
}

$sql = "SELECT * FROM users WHERE login='$login'";
$result1 = mysqli_query($conn, $sql);
$sql = "SELECT * FROM users WHERE email='$email'";
$result2 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result1) === 1 || mysqli_num_rows($result2) === 1) {
    header("Location: main.php?error_signup= Пользователь с таким логином или почтой уже существует!");
    exit();
}else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`email`, `login`, `password`) VALUES ('$email', '$login', '$password')";
    mysqli_query($conn, $sql);

    header('Location: main.php?success= Вы успешно зарегистрировались!');
}
?>