<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "Чат";




$main_number =  $_SESSION['user']['main_number'];
$check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user']['about'] = $user['about'];
    $_SESSION['user']['stat1'] = $user['stat1'];
    $_SESSION['user']['stat2'] = $user['stat2'];
    $_SESSION['user']['avatar'] = $user['avatar'];
}

$messId = $_GET['mess'];

$check_userMess = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$messId'");
$check_userMess = mysqli_fetch_assoc($check_userMess);

$check_userMessInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$messId'");
$check_userMessInfo = mysqli_fetch_assoc($check_userMessInfo);

if ($messId > $main_number) {
    $chatId = $messId + $main_number;
} else {
    $chatId =  $main_number + $messId;
}


$check_chatMess = mysqli_query($connect_users, "SELECT * FROM `chat__message` WHERE `chat_number` = '$chatId'");

$myChats = mysqli_query($connect_users, "SELECT * FROM `chat__create` WHERE `main_number1` = '$main_number' OR `main_number2` = '$main_number'");



?>



<?php while ($message = mysqli_fetch_array($check_chatMess)) {
    if ($message['ancets'] != 0) {
        $ancetId = $message['ancets'];
        $thisAncet = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `id` = '$ancetId'");
        $thisAncet = mysqli_fetch_assoc($thisAncet);
        $userNumber = $thisAncet['main_number'];
        $thisUser = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$userNumber' ");
        $thisUser = mysqli_fetch_assoc($thisUser);


        $check_userDataKids = mysqli_query($connect_users, "SELECT * FROM `user__quest-kid` WHERE `main_number` = '$userNumber' ");
        $check_userDataKids = mysqli_fetch_assoc($check_userDataKids);

        $coauntKid = 0;
        for ($h = 1; $h <= 7; $h++) {
            if ($check_userDataKids['kid' . $h] != NULL) {
                $coauntKid++;
            }
        }
        
?>
<div class="messager__chat-block">
    <div
        class="messager__chat-mes <?php if ($message['main_number'] == $main_number) { ?>messager__chat-mes-me<?php } else { ?>messager__chat-mes-user<?php } ?> messager__chat-mesAnc">
        <div class="quesList-block quesList-block__pas">
            <div class="quesList-block__title">
                <h2><?php echo $thisAncet['title']; ?></h2>
            </div>
            <div class="quesList-block__name"><?php echo $thisUser['name']; ?></div>
            <div class="quesList-block__desc">
                <p><?php echo $thisAncet['comment']; ?></p>
            </div>
            <?php if ($thisAncet['type'] == 2) { ?>
            <div class="quesList-block__sub-title">
                <h3>Дети</h3>
            </div>
            <div class="quesList-block__kids-list">
                <ol>

                    <?php for ($c = 1; $c <= $coauntKid; $c++) {
                                    $kidIdSearch = $check_userDataKids['kid' . $c];
                                    $kidSearchData = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$kidIdSearch'");
                                    $kidSearchData = mysqli_fetch_assoc($kidSearchData);

                                    if (empty($kidSearchData['name'])) {
                                        continue;
                                    }

                                ?>
                    <li><?php echo $kidSearchData['name']; ?> - <?php echo $kidSearchData['old']; ?></li>

                    <?php }; ?>
                </ol>
            </div>
            <?php }; ?>

            <div class="quesList-block__author">
                <a href="user.php?userid=<?php echo $thisAncet['main_number'];?>">Перейти на личную страницу</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($message['service_id'] != 0) { 
        $serviceId = $message['service_id'];
        $thisService = mysqli_query($connect_users, "SELECT * FROM `service__db` WHERE `service_number` = '$serviceId'");
        $thisService = mysqli_fetch_assoc($thisService);

        $kidid = $thisService['kid-id'];
        $thisKid= mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$kidid'");
        $thisKid = mysqli_fetch_assoc($thisKid);
        ?>
<div class="messager__chat-block">
    <div
        class="messager__chat-mes <?php if ($message['main_number'] == $main_number) { ?>messager__chat-mes-me<?php } else { ?>messager__chat-mes-user<?php } ?>">
        <div class="service__title">
            <h2><?php echo $thisService['title'];?></h2>
        </div>
        <div class="service__type">
            <p><?php if ($thisService['type'] == 1){echo 'Одно занятие';} else  if ($thisService['type'] == 2){echo 'Каждую Неделю';}?>
            </p>
        </div>
        <div class="service__subtitle">
            <h3>Информация об услуге</h3>
        </div>
        <div class="service-sec service__price">
            <p>Цена: <span><?php echo $thisService['price']?></span> рубля(ей) за
                <span><?php echo $thisService['duration']?></span> минут</p>
        </div>
        <div class="service-sec service__time">
            <?php if ($thisService['type'] == 1){
                        $date = $thisService['data'];
                        $date =date("d.m.Y", strtotime($date));

                        ?>
            <p>Дата занятия: <span><?php echo $date;?></span> в <span><?php echo $thisService['dataTime'];?></span></p>
            <?php } ?>

            <?php if ($thisService['type'] == 2){?>
                <div class="service__week">
                <h3>Расписание занятий</h3>
                <?php ?>
                <?php
                        $days = json_decode($thisService['days'], true);
                        
                        $week = array(
                            '1' => 'Понедельник',
                            '2' => 'Вторник',
                            '3' => 'Среда',
                            '4' => 'Четверг',
                            '5' => 'Пятница',
                            '6' => 'Суббота',
                            '7' => 'Воскресенье',
                        );

                        for ($i = 1; $i <= 7; $i++){
                        ?>
            <?php if (!empty($days[$i])){?>
            <p><?php echo $week[$i]?>: <?php echo $days[$i]?></p>
            <?php } ?>
            <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class="service-sec service__kid">
            <p>Имя ребёнка: <span><?php echo $thisKid['name'];?></span></p>
        </div>
        <div class="service-sec service__comment">
            <h3>Комментарий:</h3>
            <p class="service__comment-item"><?php echo $thisService['Comment'];?></p>
        </div>
        <div class="service__assept">
            <?php if($main_number != $thisService['author']){?>
                <?php if ($thisService['status'] == 'wait'){?>
                <div class="service__assept-btn">
                    <button id="<?php echo $thisService['id'];?>" class="asseptService">Принять</button>
                    <button id="<?php echo $thisService['id'];?>" class="declineService">Отклонить</button>
                </div>
                <?php } ?>
                <?php if ($thisService['status'] == 'ok'){?>
                    <div class="service__assept-status">
                    Принято
                </div>
                <?php } ?>
                <?php if ($thisService['status'] == 'none'){?>
                    <div class="service__assept-status">
                    Отклонено
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="service__assept-status">
                    <?php if ($thisService['status'] == 'wait'){?>
                        Ожидаем ответ
                    <?php } ?>
                    <?php if ($thisService['status'] == 'ok'){?>
                        Принято
                    <?php } ?>
                    <?php if ($thisService['status'] == 'none'){?>
                        Отклонено
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<div class="messager__chat-block">
    <div
        class="messager__chat-mes <?php if ($message['main_number'] == $main_number) { ?>messager__chat-mes-me<?php } else { ?>messager__chat-mes-user<?php } ?>">
        <p><?php echo $message['message']; ?></p>
    </div>
</div>
<?php } ?>

