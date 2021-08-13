<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "Личный кабинет";

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

</head>

<body>
    <?php require_once('INC/header.php') ?>

    <?php require_once('INC/leftPanel.php') ?>
    <main class="story">
        <section class=" aboutUser">
            <div class="container">
                <div class="page__block story__wrap">
                    <div class="story__top-control">
                        <select name="status" id="">
                            <option value="">Любой статус</option>
                            <option value="">Отменена</option>
                            <option value="">Успешно</option>
                        </select>
                        <select name="mounth" id="">
                            <option value="">Месяц</option>
                            <option value="">Январь</option>
                            <option value="">Февраль</option>
                            <option value="">Март</option>
                            <option value="">Апрель</option>
                            <option value="">Май</option>
                            <option value="">Июнь</option>
                            <option value="">Июль</option>
                            <option value="">Август</option>
                            <option value="">Сентябрь</option>
                            <option value="">Октябрь</option>
                            <option value="">Ноябрь</option>
                            <option value="">Декабрь</option>
                        </select>
                        <select name="yaer" id="">
                            <option value="">2021</option>
                        </select>
                    </div>
                    <div class="story__bottom-content">
                        <table class="story__bottom-table">
                            <thead>
                                <tr>
                                    <td class="story__bottom-name">Название консультации</td>
                                    <td class="story__bottom-date">Дата</td>
                                    <td class="story__bottom-during">Длительность</td>
                                    <td class="story__bottom-status">Статус</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="story__bottom-name">Название консультации</td>
                                    <td class="story__bottom-date">Дата</td>
                                    <td class="story__bottom-during">Длительность</td>
                                    <td class="story__bottom-status">Статус</td>
                                </tr>
                            </tbody>
                        </table>
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