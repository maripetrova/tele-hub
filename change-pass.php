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
            <a href="main.html"><img src="imgs/profile/black-dino-white2.png" alt="Логотип" class="prof-logo"></a>
            <ul class="prof__list">
                <li>
                    <a href="profile.html" class="prof__file">Профиль</a>
                </li>
                <li>
                    <a href="profile.html">Личные данные</a>
                </li>
                <li>
                    <a onclick="link_to_change_pass()" style="cursor:pointer;">Смена пароля</a>
                </li>
                <li>
                    <a href="" class="prof__links prof__soon">Калькулятор</a>
                </li>
                <li>
                    <a href="">Оформленные тарифы</a>
                </li>
                <li>
                    <a href="main.html"><button class="prof__btn-go">Выйти</button></a>
                </li>
            </ul>
            <img src="imgs/profile/img_profile-dog.png" alt="Природа" class="prof__img-left">
        </div>
        <div class="prof__right">
            <div class="prof__right_bottom">
                <form action="change_check.php" method="post" class="form form--change-pass">
                    <h1 class="form__title form__title--change-pass">Смена пароля</h1>
                    <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <div class="form__box">
                        <input type="password" name="old_password" placeholder="Старый пароль:" class="form__input">
                        <input type="password" name="new_password" placeholder="Новый пароль:" class="form__input">
                        <button type="submit" class="form__btn">Сменить</button>
                    </div>
                </form>
            </div>
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