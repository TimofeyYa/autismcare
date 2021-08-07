<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "Мои занятия";

$main_number =  $_SESSION['user']['main_number'];
$check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user']['about'] = $user['about'];
    $_SESSION['user']['stat1'] = $user['stat1'];
    $_SESSION['user']['stat2'] = $user['stat2'];
    $_SESSION['user']['avatar'] = $user['avatar'];
}
if ($_SESSION['user']['type'] == 1) {
    $check__UserService = mysqli_query($connect_users, "SELECT * FROM `service__db` WHERE `spec_number` = '$main_number' AND `status` = 'ok'");
}
if ($_SESSION['user']['type'] == 2) {
    $check__UserService = mysqli_query($connect_users, "SELECT * FROM `service__db` WHERE `patient_number` = '$main_number' AND `status` = 'ok'");
}



?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once('INC/headAll.php') ?>


    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/system.css">
    <link rel="stylesheet" href="CSS/mylesson.css">

</head>

<body>
    <?php require_once('INC/header.php') ?>

    <?php require_once('INC/leftPanel.php') ?>
    <main class="mylesson">
        <section class=" aboutUser">
            <div class="container">
                <div class="page__block mylesson__wrap">
                    <div class="mylesson__soon-title">
                        <h2>Скоро начнутся</h2>
                    </div>
                    <div class="mylesson__content mylesson__content-soon">
                        <div class="mylesson-block">
                            <div class="mylesson-block__top">
                                <h3>Какой то интересный заголовок</h3>
                            </div>
                            <div class="mylesson-block__center">
                                <h5>Одно занятие</h5>
                                <h4>Информация о встрече</h4>
                                <p>Дата занятия: <span>13:30</span></p>
                                <p>Клиент: <span><a>Уся Пупкин</a></span></p>
                                <p>Ребёнок: <span>Гисмед Худовердиев</span></p>
                                <p class="mylesson-block__comment">Комментарий: <span>Какой то не сусветно огромный комментарий описывающий красоты такой великой и прекрасной страны как могучий Азербайджан</span></p>
                            </div>
                            <div class="mylesson-block__bottom">
                                <button class="mylesson-block__histBtn">История</button>
                                <div class="mylesson-block__mainBtn">
                                    <p>Перейти к занятию</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mylesson__content mylesson__content-All">
                        <div class="mylesson__content-allTitle">
                            <h2>Все</h2>
                        </div>
                        <?php while ($UserServ = mysqli_fetch_array($check__UserService)) {
                            $date = $UserServ['data'];
                            $date = date("d.m.Y", strtotime($date));

                            $kidId = $UserServ['kid-id'];

                            $kidInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$kidId'");
                            $kidInfo = mysqli_fetch_assoc($kidInfo);

                        ?>
                            <div class="mylesson-block">
                                <div class="mylesson-block__top">
                                    <h3><?php echo $UserServ['title']; ?></h3>
                                </div>
                                <div class="mylesson-block__center">
                                    <h5><?php if ($UserServ['type'] == 1) { ?>Одно занятие<?php } else if ($UserServ['type'] == 2) { ?>Каждую неделю<?php } ?></h5>
                                    <h4>Информация о встрече</h4>
                                    <?php if ($UserServ['type'] == 1) { ?>
                                        <p>Дата занятия: <span><?php echo $date; ?></span> в <span><?php echo $UserServ['dataTime']; ?></span></p>
                                    <?php } ?>
                                    <?php if ($UserServ['type'] == 2) { ?>
                                        <div class="service__week">
                                            <h3>Расписание занятий:</h3>
                                            <?php ?>
                                            <?php
                                            $days = json_decode($UserServ['days'], true);

                                            $week = array(
                                                '1' => 'Понедельник',
                                                '2' => 'Вторник',
                                                '3' => 'Среда',
                                                '4' => 'Четверг',
                                                '5' => 'Пятница',
                                                '6' => 'Суббота',
                                                '7' => 'Воскресенье',
                                            );

                                            for ($i = 1; $i <= 7; $i++) {
                                            ?>
                                                <?php if (!empty($days[$i])) { ?>
                                                    <p><?php echo $week[$i] ?>: <?php echo $days[$i] ?></p>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($UserServ['spec_number'] == $main_number) {
                                        $userId = $UserServ['patient_number'];

                                        $userInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$userId'");
                                        $userInfo = mysqli_fetch_assoc($userInfo);



                                    ?>
                                        <p>Клиент: <span><a href="user.php?userid=<?php echo $userId; ?>"><?php echo $userInfo['name']; ?></a></span></p>
                                    <?php } ?>


                                    <?php if ($UserServ['patient_number'] == $main_number) {
                                        $userId = $UserServ['spec_number'];

                                        $userInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$userId'");
                                        $userInfo = mysqli_fetch_assoc($userInfo);
                                    ?>
                                        <p>Специалист: <span><a href="user.php?userid=<?php echo $userId; ?>"><?php echo $userInfo['name']; ?></a></span></p>
                                    <?php } ?>
                                    <p>Ребёнок: <span><?php echo $kidInfo['name']; ?></span></p>
                                    <p class="mylesson-block__comment">Комментарий: <span><?php echo $UserServ['Comment']; ?></span></p>
                                </div>
                                <div class="mylesson-block__bottom">
                                    <button class="mylesson-block__histBtn">История</button>
                                    <div class="mylesson-block__mainBtn">
                                        <p>Перейти к занятию</p>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </section>


        <script src="JS/system.js"></script>
        <script src="JS/mylesson.js"></script>
        <script src="JS/portfol.js"></script>
        <script src="JS/kids.js"></script>
        
</body>

</html>