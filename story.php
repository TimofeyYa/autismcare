<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "История занятий";

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
    <link rel="stylesheet" href="CSS/story.css">

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
                        <div class="story__bottom-table">
                            <div class="story__bottom-item story__bottom-thead">
                                <div class="story__bottom-block">Название Консультации</div>
                                <div class="story__bottom-block">Дата</div>
                                <div class="story__bottom-block">Длительность</div>
                                <div class="story__bottom-block"></div>
                                <div class="story__bottom-block story__bottom-status">Статус</div>
                            </div>
                            <div class="story__bottom-item ">
                                <div class="story__bottom-block">Работаем с речью</div>
                                <div class="story__bottom-block">13.08.2021 в 13:00</div>
                                <div class="story__bottom-block">30 минут</div>
                                <div class="story__bottom-block"></div>
                                <div class="story__bottom-block story__bottom-status story__bottom-status-assept" title="Отменена Специалистом">Успешно</div>
                                <div class="story__bottom-block"></div>
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