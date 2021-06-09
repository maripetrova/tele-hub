<?php
session_start();
include "db_conn.php";
$chk_password = filter_var(trim($_POST['new_password']),
FILTER_SANITIZE_STRING);

if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST['old_password'])) {
        header("Location: change-pass.php?error= Вы не написали старый пароль!");
        exit();
    }else if(empty($_POST['new_password'])) {
        header("Location: change-pass.php?error= Вы не написали новый пароль!");
        exit();
    }else if($_POST['old_password'] === $_POST['new_password']) {
        header("Location: change-pass.php?error= Новый пароль не может совпадать со старым!");
        exit();
    }else{
        $new_pass = validate($_POST['new_password']);
        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $pass = validate($_POST['old_password']);

        if(mb_strlen($chk_password) < 6 || mb_strlen($chk_password) > 20) {
            header("Location: change-pass.php?error= Длинна пароля должна быть больше 6 и меньше 20 символов!");
            exit();
        } else {
            $id = $_SESSION['id'];
            $sql = "SELECT `password` FROM users WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) === 1 && password_verify($pass, $row['password'])) {
                $sql = "UPDATE `users` SET `password`='$new_pass' WHERE `id`='$id'";
                mysqli_query($conn, $sql);
                header("Location: change-pass.php?success= Пароль успешно был изменён!");
                exit();
            }else {
                header("Location: change-pass.php?error= Неверный старый пароль!");
                exit();
            }
        }
    }

}else {
    header("Location: change-pass.php?error");
    exit();
}