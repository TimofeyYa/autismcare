<?php
   session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }
    
    require_once 'vendor/connect.php';
    $pageName = "Просмотр анкет";


    $main_number =  $_SESSION['user']['main_number'];
    $check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc( $check_user);

        $_SESSION['user']['about'] = $user['about'];
        $_SESSION['user']['stat1'] = $user['stat1'];
        $_SESSION['user']['stat2'] = $user['stat2'];
        $_SESSION['user']['avatar'] = $user['avatar'];

   }

   $ancetsForMe =mysqli_query($connect_users, "SELECT * FROM `ancets__data` WHERE `recipient_num` = '$main_number'");
   $ancetsMy =mysqli_query($connect_users, "SELECT * FROM `ancets__data` WHERE `sender_num` = '$main_number'");
   


   
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once('INC/headAll.php')?>


    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/system.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/ancets.css">

</head>

<body>
    <?php require_once('INC/header.php')?>

    <?php require_once('INC/leftPanel.php')?>
    <main class="ancets">
        <section class="ancets">
            <div class="container">
                <div class="page__block ancets__wrap">
                    <div class="ancets-control ancets-control__forme ">Мои заявки</div>
                    <div class="ancets-control ancets-control__my ">Отправленные заявки</div>
                    <div class="ancets__content">
                        <div class="ancets__content-forme">
                            <?php if ($_SESSION['user']['type'] == 2){
                                while ($ancets = mysqli_fetch_array($ancetsForMe)){
                                    $ancetsID = $ancets['ancet_id'];
                                    $ancetsMainID = $ancets['id'];
                                    $thisAncet = mysqli_query($connect_users,"SELECT * FROM `user__quest-spec` WHERE `id`='$ancetsID'");
                                    $thisAncet = mySqli_fetch_assoc($thisAncet);
                                    $thisUser = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$userNumber'");
                                    $thisUser = mySqli_fetch_assoc($thisUser);
                                ?>
                            <div class="quesList-block quesList-block__spec">
                                <div class="quesList-block__title">
                                    <h2><?php echo $thisAncet['title'];?></h2>
                                </div>
                                <div class="quesList-block__name"><?php echo $thisAncet['title'];?></div>
                                <div class="quesList-block__desc">
                                    <p><?php echo $thisAncet['comment'];?></p>
                                </div>
                                <div class="quesList-block__btns">
                                    <?php if($ancets['status'] == 1){?>
                                    <button class="main-btn__gra">Ответить</button>
                                    <a class="ancetsDecl" id="<?php echo $ancetsMainID;?>" href="#">Отклонить</a>
                                    <?php }?>
                                    <?php if($ancets['status'] == 0){?>
                                        <div class="quesList-decline">Отклонена</div>
                                    <?php }?>
                                    <a href="user.php?userid=<?php echo $thisAncet['main_number'];?>">Посмотреть профиль</a>
                                    <a href="#">Посмотреть полностью</a>
                                </div>
                            </div>
                            <?php }};?>



                            <?php if ($_SESSION['user']['type'] == 1){
                                while ($ancets = mysqli_fetch_array($ancetsForMe)){
                                    $ancetsID = $ancets['ancet_id'];
                                    $ancetsMainID = $ancets['id'];
                                    $thisAncet = mysqli_query($connect_users,"SELECT * FROM `user__quest-spec` WHERE `id`='$ancetsID'");
                                    $thisAncet = mySqli_fetch_assoc($thisAncet);
                                    $userNumber = $thisAncet['main_number'];
                                    $thisUser = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$userNumber'");
                                    $thisUser = mySqli_fetch_assoc($thisUser);
                                    
                                    $check_userDataKids = mysqli_query($connect_users, "SELECT * FROM `user__quest-kid` WHERE `main_number` = '$userNumber' ");
                                    $check_userDataKids = mysqli_fetch_assoc($check_userDataKids);
                                
                                    $coauntKid = 0;
                                    for ($h = 1; $h <= 7; $h++){
                                        if ($check_userDataKids['kid'.$h] !=NULL){
                                            $coauntKid++;
                                        }
                                    }

                                ?>
                            <div class="quesList-block quesList-block__pas">
                                <div class="quesList-block__title">
                                    <h2><?php echo $thisAncet['title'];?></h2>
                                </div>
                                <div class="quesList-block__name"><?php echo $thisUser['name'];?></div>
                                <div class="quesList-block__desc">
                                    <p><?php echo $thisAncet['comment'];?></p>
                                </div>
                                <div class="quesList-block__sub-title">
                                    <h3>Дети</h3>
                                </div>
                                <div class="quesList-block__kids-list">
                                    <ol>

                                    <?php for ($c = 1; $c <= $coauntKid; $c++){
                                        $kidIdSearch = $check_userDataKids['kid'.$c];
                                        $kidSearchData = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$kidIdSearch'");
                                        $kidSearchData = mysqli_fetch_assoc($kidSearchData);
                                        
                                        if (empty($kidSearchData['name'])){
                                            continue;
                                        }
                                        ?>
                                    <li><?php echo $kidSearchData['name'];?> - <?php echo $kidSearchData['old'];?>  <a href="#">Подробнее</a></li>
                                    
                                    <?php };?>
                                    </ol>
                                </div>
                                <div class="quesList-block__btns">
                                    <?php if($ancets['status'] == 1){?>
                                    <button class="main-btn__gra">Ответить</button>
                                    <a class="ancetsDecl" id="<?php echo $ancetsMainID;?>" href="#">Отклонить</a>
                                    <?php }?>
                                    <?php if($ancets['status'] == 0){?>
                                        <div class="quesList-decline">Отклонена</div>
                                    <?php }?>
                                    <a href="user.php?userid=<?php echo $thisAncet['main_number'];?>">Посмотреть профиль</a>
                                    <a href="#">Посмотреть полностью</a>
                                </div>
                            </div>
                            <?php } };?>
                        </div>


                        <div class="ancets__content-my">
                        <?php if ($_SESSION['user']['type'] == 1){
                             while ($ancets = mysqli_fetch_array($ancetsMy)){
                                $ancetsID = $ancets['ancet_id'];
                                $thisAncet = mysqli_query($connect_users,"SELECT * FROM `user__quest-spec` WHERE `id`='$ancetsID'");
                                $thisAncet = mySqli_fetch_assoc($thisAncet);
                                $thisUser = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$userNumber'");
                                $thisUser = mySqli_fetch_assoc($thisUser);

                                $recipientNum = $ancets['recipient_num'];
                                $recipient = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$recipientNum'");
                                $recipient = mySqli_fetch_assoc($recipient);
                            ?>
                            <div class="quesList-block quesList-block__spec">
                                <div class="quesList-block__title">
                                    <h2><?php echo $thisAncet['title'];?></h2>
                                </div>
                                <div class="quesList-block__name"><?php echo $thisUser['name'];?></div>
                                <div class="quesList-block__desc">
                                    <p><?php echo $thisAncet['comment'];?></p>
                                </div>
                                <div class="quesList-block__target">
                                    Отправлено к: <a href="user.php?userid=<?php echo $ancets['recipient_num'];?>"><?php echo  $recipient['name'];?></a>
                                </div>
                                <div class="quesList-block__status">
                                  <div class="quesList-block__status-<?php if ($ancets['status'] == 2){?>ok<?php } else  if ($ancets['status'] == 1){?>wait<?php } else  if ($ancets['status'] == 0){?>none<?php }?>">Текущий статус</div>
                                  <a id="<?php echo $ancets['id'];?>">Удалить</a>
                                </div>
                            </div>
                            <?php } }?>


                            <?php if ($_SESSION['user']['type'] == 2){
                                 while ($ancets = mysqli_fetch_array($ancetsMy)){
                                    $ancetsID = $ancets['ancet_id'];
                                    $thisAncet = mysqli_query($connect_users,"SELECT * FROM `user__quest-spec` WHERE `id`='$ancetsID'");
                                    $thisAncet = mySqli_fetch_assoc($thisAncet);
                                    $userNumber = $thisAncet['main_number'];
                                    $thisUser = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$userNumber'");
                                    $thisUser = mySqli_fetch_assoc($thisUser);
                                    
                                    $check_userDataKids = mysqli_query($connect_users, "SELECT * FROM `user__quest-kid` WHERE `main_number` = '$userNumber' ");
                                    $check_userDataKids = mysqli_fetch_assoc($check_userDataKids);
                                
                                    $coauntKid = 0;
                                    for ($h = 1; $h <= 7; $h++){
                                        if ($check_userDataKids['kid'.$h] !=NULL){
                                            $coauntKid++;
                                        }
                                    }

                                    $recipientNum = $ancets['recipient_num'];
                                $recipient = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$recipientNum'");
                                $recipient = mySqli_fetch_assoc($recipient);
                                ?>
                            <div class="quesList-block quesList-block__pas">
                                <div class="quesList-block__title">
                                    <h2><?php echo $thisAncet['title'];?></h2>
                                </div>
                                <div class="quesList-block__name"><?php echo $thisUser['name'];?></div>
                                <div class="quesList-block__desc">
                                    <p><?php echo $thisAncet['comment'];?></p>
                                </div>
                                <div class="quesList-block__sub-title">
                                    <h3>Дети</h3>
                                </div>
                                <div class="quesList-block__kids-list">
                                    <ol>
                                    <?php for ($c = 1; $c <= $coauntKid; $c++){
                                        $kidIdSearch = $check_userDataKids['kid'.$c];
                                        $kidSearchData = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$kidIdSearch'");
                                        $kidSearchData = mysqli_fetch_assoc($kidSearchData);
                                        
                                        if (empty($kidSearchData['name'])){
                                            continue;
                                        }
                                        ?>
                                    <li><?php echo $kidSearchData['name'];?> - <?php echo $kidSearchData['old'];?>  <a href="#">Подробнее</a></li>
                                    
                                    <?php };?>
                                    </ol>
                                </div>
                                <div class="quesList-block__target">
                                    Отправлено к: <a href="user.php?userid=<?php echo $ancets['recipient_num'];?>"><?php echo  $recipient['name'];?></a>
                                </div>
                                <div class="quesList-block__status">
                                  <div class="quesList-block__status-<?php if ($ancets['status'] == 2){?>ok<?php } else  if ($ancets['status'] == 1){?>wait<?php } else  if ($ancets['status'] == 0){?>none<?php }?>">Текущий статус</div>
                                  <a id="<?php echo $ancets['id'];?>">Удалить</a>
                                </div>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php require_once('INC/footer.php')?>
    <script src="JS/system.js"></script>
    <script src="JS/ancets.js"></script>

</body>

</html>