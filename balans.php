<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "Мои финансы";

$main_number =  $_SESSION['user']['main_number'];
$check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user']['about'] = $user['about'];
    $_SESSION['user']['stat1'] = $user['stat1'];
    $_SESSION['user']['stat2'] = $user['stat2'];
    $_SESSION['user']['avatar'] = $user['avatar'];
}
$check_userEdu = mysqli_query($connect_users, "SELECT * FROM `accaunts-edu` WHERE `main_number` = '$main_number'");
$check_userEduArea = mysqli_query($connect_users, "SELECT * FROM `accaunts-edu` WHERE `main_number` = '$main_number'");
$check_userPort = mysqli_query($connect_users, "SELECT * FROM `accaunts-port` WHERE `main_number` = '$main_number'");
$check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$main_number'");


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once('INC/headAll.php') ?>


    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/system.css">
    <link rel="stylesheet" href="CSS/balans.css">

</head>

<body>
    <?php require_once('INC/header.php') ?>

    <?php require_once('INC/leftPanel.php') ?>
    <main class="balans">
        <section class=" balans__section">
            <div class="container">
                <div class="page__block balans__wrap">
                    <div class="balans__leftPanel">
                        <div class="balans__leftPanel-content">
                            <div class="balans__leftPanel-text">
                                <p>За этот месяц<br>вы заработали</p>
                            </div>
                            <div class="balans__leftPanel-money">
                                <p>22 500₽</p>
                            </div>
                            <div class="balans__leftPanel-soon">
                                <p>18 999 ожидают оплаты</p>
                            </div>
                        </div>
                    </div>
                    <div class="balans__content">
                    <div class="balans__bottom-table">
                            <div class="balans__bottom-item balans__bottom-thead">
                                <div class="balans__bottom-block">Название Консультации</div>
                                <div class="balans__bottom-block">Дата</div>
                                <div class="balans__bottom-block">Клиент</div>
                                <div class="balans__bottom-block">Сумма</div>
                                <div class="balans__bottom-block balans__bottom-status">Статус</div>
                            </div>
                            <div class="balans__bottom-item ">
                                <div class="balans__bottom-block">Речь</div>
                                <div class="balans__bottom-block">13.08.2021</div>
                                <div class="balans__bottom-block">Анна Ивановна</div>
                                <div class="balans__bottom-block">600₽</div>
                                <div class="balans__bottom-block balans__bottom-status balans__bottom-status-none" title="Отменена Специалистом">Ожидаем</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once('INC/footer.php') ?>



    <script src="JS/system.js"></script>
    <script src="JS/portfol.js"></script>
    <script src="JS/kids.js"></script>
</body>

</html>