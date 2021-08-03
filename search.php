<?php
    session_start();
     if(!isset($_SESSION['user'])){
         header('location: index.php');
     }
     
     require_once 'vendor/connect.php';
     if ($_SESSION['user']['type'] == 1){
     $pageName = "Поиск клиента";
     $check_searchSpec = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `type` = 2 AND `visually` = 'yes'");
     }
     if ($_SESSION['user']['type'] == 2){
        $pageName = "Поиск специалиста";
        $check_searchSpec = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `type` = 1 AND `visually` = 'yes'");
     }
     $main_number =  $_SESSION['user']['main_number'];

     $check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$main_number'");
     $check_userQuest = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `main_number` = '$main_number'");
     if (mysqli_num_rows($check_userQuest) > 0){
        $userQuest = mysqli_fetch_assoc($check_userQuest);


    }

    



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
</head>

<body>
    <?php require_once('INC/header.php')?>

    <?php require_once('INC/leftPanel.php')?>

    <main class="search">
        <section class="search-panel__control">
            <div class="container">
                <div class="page__block search-panel__wrap">
                    <div class="quest-see__btn">
                        <button class="main-btn__gra">Моя анкета</button>
                    </div>
                    <div class="ques-see__selector">
                        <p>Отображать анкету</p>
                        <div class="ques-see__status <?php if($userQuest['visually']=='no'){?>ques-see__status-no<?php };?><?php if($userQuest['visually']=='yes'){?>ques-see__status-yes<?php };?>"><p></p></div>
                        
                    </div>
                    <div class="ques-see__help">
                        ?
                    </div>
                </div>
            </div>
        </section>

        <section class="search-ques">
            <div class="container">
                <div class="page__block search-panel__wrap">
                    <div class="quesList-content">

                        <?php if ($_SESSION['user']['type'] == 1){?>
                            <?php while ($specSearch = mysqli_fetch_array($check_searchSpec)){
                                $userMainNum = $specSearch['main_number'];
                                $check_userData = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$userMainNum' ");
                                $check_userData = mysqli_fetch_assoc($check_userData);

                                $check_userDataKids = mysqli_query($connect_users, "SELECT * FROM `user__quest-kid` WHERE `main_number` = '$userMainNum' ");
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
                                <h2><?php echo $specSearch['title'];?></h2>
                            </div>
                            <div class="quesList-block__name"><?php echo $check_userData['name'];?></div>
                            <div class="quesList-block__desc">
                                <p><?php echo $specSearch['comment'];?></p>
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
                                <button class="main-btn__gra">Отправить анкету</button>
                                <input type="hidden" class="myAncID" value="<?php if (isset($userQuest)){echo $userQuest['id'];}?>">
                                <input type="hidden" class="recipientNum" value="<?php echo $specSearch['main_number'];?>">
                                <a href="user.php?userid=<?php echo $specSearch['main_number'];?>">Посмотреть профиль</a>
                                <a href="#">Посмотреть полностью</a>
                            </div>
                        </div>
                        <?php };?>
                        <?php };?>



                        <?php if ($_SESSION['user']['type'] == 2){?>
                            <?php while ($specSearch = mysqli_fetch_array($check_searchSpec)){
                                $userMainNum = $specSearch['main_number'];
                                $check_userData = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$userMainNum' ");
                                $check_userData = mysqli_fetch_assoc($check_userData);
                                
                                ?>
                        <div class="quesList-block quesList-block__spec">
                            <div class="quesList-block__title">
                                <h2><?php echo $specSearch['title'];?></h2>
                            </div>
                            <div class="quesList-block__name"><?php echo $check_userData['name'];?></div>
                            <div class="quesList-block__desc">
                                <p><?php echo $specSearch['comment'];?></p>
                            </div>
                            <div class="quesList-block__btns">
                                <button class="main-btn__gra">Отправить анкету</button>
                                <input type="hidden" class="myAncID" value="<?php if (isset($userQuest)){echo $userQuest['id'];}?>">
                                <input type="hidden" class="recipientNum" value="<?php echo $specSearch['main_number'];?>">
                                <a href="user.php?userid=<?php echo $specSearch['main_number'];?>">Посмотреть профиль</a>
                                <a href="#">Посмотреть полностью</a>
                            </div>
                        </div>
                        <?php };?>
                        <?php };?>

                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once('INC/footer.php')?>
    <div class="popup-quest">
        <div class="popup-quest__wrap">
            <div class="popup__quest-exit">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32"
                    style="enable-background:new 0 0 32 32;" xml:space="preserve">
                    <g>
                        <g id="x_x5F_alt">
                            <path d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M23.914,21.086
            l-2.828,2.828L16,18.828l-5.086,5.086l-2.828-2.828L13.172,16l-5.086-5.086l2.828-2.828L16,13.172l5.086-5.086l2.828,2.828
            L18.828,16L23.914,21.086z" />
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg>
            </div>
            
            <form class="popup-quest__form">
                <input name="questType" type="hidden" value="<?php echo $_SESSION['user']['type'];?>">
                <div class="popup__quest-title">
                    <h2>Ваша анкета</h2>
                </div>
                <input required name="questTitle" maxlength="50" class="input__quest-title" value="<?php if (isset($userQuest)){echo $userQuest['title'];}?>" placeholder="Впишите заголовок|" type="text">
                <div class="popup-quest__textarea">
                    <textarea name="questDesc" placeholder="Расскажите почему должны выбрать именно вас!" class="quest__textarea" id="" cols="30" rows="10"><?php if (isset($userQuest)){echo $userQuest['comment'];}?></textarea>
                </div>
                <?php if ($_SESSION['user']['type'] == 2){?>
                    <div class="popup__quest-kids">
                        <div class="popup__quest-kids-title">
                            <h3>Выберете детей</h3>
                        </div>
                        <?php $i=1; while ($kid = mysqli_fetch_array($check_userKids)){
                            $kidId = $kid['id'];
                            $itSelect = 0;
                            for ($j = 1; $j <= 7; $j++){
                                $checkItem = 'kid'.$j;
                                
                                $check_selKid = mysqli_query($connect_users, "SELECT * FROM `user__quest-kid` WHERE `main_number` = '$main_number' AND `$checkItem` = '$kidId'");
                                if (mysqli_num_rows($check_selKid) > 0){
                                   
                                    $itSelect = 1;
                                }
                            }


                            ?>
                        <div class="popup__quest-kids-block <?php if($itSelect == 1){?>popup__quest-block-select<?php };?>">
                            <input type="hidden" class="questHiddenInp" name="kid-<?php echo $i;?>" value >
                            <div class="popup__quest-kids-id"><?php echo $kid['id'];?></div>
                            <?php echo $kid['name'];?>
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 148.961 148.961" style="enable-background:new 0 0 148.961 148.961;" xml:space="preserve">
                       <g>
                           <path d="M146.764,17.379c-2.93-2.93-7.679-2.929-10.606,0.001L68.852,84.697L37.847,53.691c-2.93-2.929-7.679-2.93-10.606-0.001
                               c-2.93,2.929-2.93,7.678-0.001,10.606l36.309,36.311c1.407,1.407,3.314,2.197,5.304,2.197c1.989,0,3.897-0.79,5.304-2.197
                               l72.609-72.622C149.693,25.057,149.693,20.308,146.764,17.379z"/>
                           <path d="M130.57,65.445c-4.142,0-7.5,3.357-7.5,7.5v55.57H15V20.445h85.57c4.143,0,7.5-3.357,7.5-7.5c0-4.142-3.357-7.5-7.5-7.5
                               H7.5c-4.142,0-7.5,3.357-7.5,7.5v123.07c0,4.143,3.358,7.5,7.5,7.5h123.07c4.143,0,7.5-3.357,7.5-7.5v-63.07
                               C138.07,68.803,134.713,65.445,130.57,65.445z"/>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       <g>
                       </g>
                       </svg>
                    </div>
                    <?php $i =$i +1; };?>
                    </div>
                   
                <?php }?>
                <div class="questControlBtn">
                    <button class="main-btn__gra add-quest__form-sub">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($_SESSION['user']['type'] == 1){?>

    <?php }?>
    <?php if ($_SESSION['user']['type'] == 2){?>
        
    <?php }?>

    <script src="JS/system.js"></script>
    <script src="JS/search.js"></script>
</body>