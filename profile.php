<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Профильная страница</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="prof__main">
        <div class="prof__left">
            <a href="logout.php" class="prof__btn-exit">Выход</a>
            <img src="imgs/profile/black-dino-white2.png" alt="Логотип" class="prof-logo">
            <ul class="prof__list">
                <li>
                    <a href="" class="prof__file">Профиль</a>
                </li>
                <li>
                    <a href="">Личные данные</a>
                </li>
                <li>
                    <a onclick='link_to_change_pass()' style='cursor:pointer;'>Смена пароля</a>
                </li>
                <li>
                    <a href="" class="prof__links prof__soon">Калькулятор</a>
                </li>
                <li>
                    <a href="">Оформленные тарифы</a>
                </li>
            </ul>
            <img src="imgs/profile/img_profile-dog.png" alt="Природа" class="prof__img-left">
        </div>
        <div class="prof__right">
            <h1>Hello, <?php echo $_SESSION['login']; ?></h1>
            <div class='prof__right_bottom'></div>
        </div>
    </div>
  <script src="scripts/profile.js"></script>
</body>
</html>
<?php 
}else {
    header("Location: index.php");
    exit();
}
?>