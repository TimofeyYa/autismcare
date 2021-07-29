<?php
   session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }
    
    require_once 'vendor/connect.php';
    $pageName = "Кабинет пользователя";

    

    if (!isset($_GET['userid'])){
        header('location: profil.php');
    }

    $userId = $_GET['userid'];

    $main_number =  $_SESSION['user']['main_number'];
    $check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc( $check_user);

        $_SESSION['user']['about'] = $user['about'];
        $_SESSION['user']['stat1'] = $user['stat1'];
        $_SESSION['user']['stat2'] = $user['stat2'];
        $_SESSION['user']['avatar'] = $user['avatar'];

   }

   $oldMain_number = $main_number;

   $main_number =  $userId;

   if ($oldMain_number == $main_number){
       header('location: profil.php');
   }
   $userBasic = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$main_number'");
   $userBasic = mysqli_fetch_assoc($userBasic);

   $userMainInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
   $userMainInfo = mysqli_fetch_assoc($userMainInfo);



   $check_userEdu = mysqli_query($connect_users, "SELECT * FROM `accaunts-edu` WHERE `main_number` = '$main_number'");
   $check_userEduArea = mysqli_query($connect_users, "SELECT * FROM `accaunts-edu` WHERE `main_number` = '$main_number'");
   $check_userPort = mysqli_query($connect_users, "SELECT * FROM `accaunts-port` WHERE `main_number` = '$main_number'");
   $check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$main_number'");
   

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once('INC/headAll.php')?>


    <link rel="stylesheet" href="font/stylesheet.css">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/system.css">
    
</head>

<body>
    <?php require_once('INC/header.php')?>

    <?php require_once('INC/leftPanel.php')?>
    <main class="profil">
        <section class=" aboutUser">
            <div class="container">
                <div class="page__block aboutUser__wrap">
                    <div class="aboutUser__side aboutUser__side-left">
                        <div class="aboutUser__pic">
                            <img src="uploads/<?php echo $userMainInfo['avatar']; ?>" alt="">
                        </div>
                        <div class="aboutUser__btn">

                            <?php if(!isset($_GET['edit'])){?>
                            <button onclick="window.location.href='chat.php?mess=<?php echo $main_number;?>'"
                                class="main-btn__gra profil_edit-btn">Написать</button>
                            <?php };?>
                        </div>
                        <div class="aboutUser__stat">
                            <?php if ($userBasic['type'] == 1){
                             ?>
                            <p>Отзывов на сайте: <span
                                    class="blue__color"><?php echo $_SESSION['user']['stat1'];?></span></p>
                            <p>Пациентов: <span class="blue__color"><?php echo $_SESSION['user']['stat2'];?></span></p>
                            <?php };?>
                            <?php if ($userBasic['type'] == 2){
                             ?>
                            <p>Детей: <span class="blue__color"><?php echo $_SESSION['user']['stat1'];?></span></p>
                            <p>Специалистов: <span class="blue__color"><?php echo $_SESSION['user']['stat2'];?></span>
                            </p>
                            <?php };?>
                        </div>
                    </div>
                    <div class="aboutUser__side aboutUser__side-right">
                        <div class="aboutUser__name">
                            <div class="aboutUser__name-top">
                                <h2><?php echo $userBasic['name']; ?></h2>
                            </div>
                            <div class="aboutUser__name-bottom">
                                <h3 class="blue__color "> <?php if ($userBasic['type'] == 1){?>Специалист<?php };
                                 if($userBasic['type'] == 2){ ?>Пациент<?php }; ?></h3>
                            </div>
                        </div>
                        <div class="aboutUser__main-Info">
                            <div class="aboutUser__about">
                                <h3 class="aboutUser__sub-title">О себе</h3>
                                <p><?php echo $userMainInfo['about'];?></p>
                            </div>
                            <?php if ($userBasic['type'] == 1){
                             ?>
                            <div class="aboutUser__edu">
                                <h3 class="aboutUser__sub-title">Образование</h3>
                                <ol class="aboutUser__edu-list">
                                    <?php while ($row = mysqli_fetch_array($check_userEdu)) {?>
                                    <li><span><?php echo $row['content'];?></span></li>
                                    <?php };?>
                                </ol>
                            </div>
                            <?php };?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if(isset($_GET['SeeAllPort']) ){?>
        <section class="portfolAll">
            <div class="container">
                <div class="page__block portfol__wrap">
                    <div class="portfol__top">
                        <h2 class="section-title">Портфолио</h2>
                        <a href="user.php?userid=<?php echo $main_number;?>" class="blue__color portfolSeeAll">Вернуться</a>
                    </div>
                    <div class="portfol__content">
                        <?php $i=1; while ( $port = mysqli_fetch_array($check_userPort)){?>
                        <div class="portfol__block">
                            <img src="uploads/<?= $port['img-1']?>" alt="Сертефикат">
                            <div class="portfol__block-vh">
                                <?php if ($port['img-1'] != ''){?>
                                <img src="uploads/<?= $port['img-1']?>" alt="">
                                <?php };?>
                                <?php if ($port['img-2'] != ''){?>
                                <img src="uploads/<?= $port['img-2']?>" alt="">
                                <?php };?>
                                <?php if ($port['img-3'] != ''){?>
                                <img src="uploads/<?= $port['img-3']?>" alt="">
                                <?php };?>
                                <p class="portfol__block-vh-title"><?= $port['title']?></p>
                                <p class="portfol__block-vh-desc"><?= $port['descr']?></p>
                                <div class="idPortItem"><?php echo $port['id']?></div>
                            </div>
                        </div>
                        <?php 
                            
                        };?>

                    </div>
                </div>
            </div>
        </section>

        <?php };?>


        <?php if(!isset($_GET['edit']) && !isset($_GET['SeeAllPort'])){?>

        <?php if ($userBasic['type'] == 1){
            ?>
        <section class="portfol">
            <div class="container">
                <div class="page__block portfol__wrap">
                    <div class="portfol__top">
                        <h2 class="section-title">Портфолио</h2>
                        <a href="?SeeAllPort&userid=<?php echo $main_number;?>" class="blue__color portfolSeeAll">Посмотреть всё</a>
                    </div>
                    <div class="portfol__content">
                        <?php $i=1; while ( $port = mysqli_fetch_array($check_userPort)){?>
                        <div class="portfol__block">
                            <img src="uploads/<?= $port['img-1']?>" alt="Сертефикат">
                            <div class="portfol__block-vh">
                                <?php if ($port['img-1'] != ''){?>
                                <img src="uploads/<?= $port['img-1']?>" alt="">
                                <?php };?>
                                <?php if ($port['img-2'] != ''){?>
                                <img src="uploads/<?= $port['img-2']?>" alt="">
                                <?php };?>
                                <?php if ($port['img-3'] != ''){?>
                                <img src="uploads/<?= $port['img-3']?>" alt="">
                                <?php };?>
                                <p class="portfol__block-vh-title"><?= $port['title']?></p>
                                <p class="portfol__block-vh-desc"><?= $port['descr']?></p>
                                <div class="idPortItem"><?php echo $port['id']?></div>
                            </div>
                        </div>
                        <?php 
                        $i =$i+1;
                        if (($i == 5) && (mysqli_num_rows($check_userPort) < 16))
                            break;
                            if (($i == 6) && (mysqli_num_rows($check_userPort) > 16))
                            break;
                        };?>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>
        <?php if ($userBasic['type'] == 2){
            ?>
        <section class="kids">
            <div class="container">
                <div class="page__block kids__wrap">
                    <div class="kids__top">
                        <h2 class="section-title">Дети</h2>
                    </div>
                    <div class="kids__content">
                        <?php while ($kid = mysqli_fetch_array($check_userKids)){?>
                        <div class="kids__block">
                            <div class="kids__main-info">
                                <h3 class="kids__name">
                                    <?= $kid['name']?>
                                </h3>
                                <h3 class="blue__color">
                                    <?= $kid['old']?>
                                </h3>
                            </div>
                            <div class="kids__comment">
                                <p><?= $kid['about']?> </p>
                            </div>
                            <div class="kids__btn">
                                <a href="#" class="main-btn__gra">Запросить документы</a>
                            </div>
                        </div>
                        <?php };?>
                    </div>
                </div>
            </div>
        </section>

        <?php }
            ?>
        <section class="comments" style="display: none;">
            <div class="container">
                <div class="page__block comments__wrap">
                    <div class="comments__top">
                        <h2 class="section-title">Комментарии</h2>
                    </div>
                    <div class="comments__content">
                        <div class="comments__block">
                            <div class="comments__author">
                                <div class="comments__author-pic"><img src="source/system/tip/Czxc2yZUcLA.jpg" alt="">
                                </div>

                                <div class="comments__author-name">
                                    <h3>Леонид оптимист</h3>
                                    <div class="comments__type comments__type-pos">
                                        Положительный
                                    </div>
                                </div>
                            </div>
                            <div class="comment__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                    gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                            </div>
                        </div>

                        <div class="comments__block">
                            <div class="comments__author">
                                <div class="comments__author-pic"><img src="source/system/tip/Czxc2yZUcLA.jpg" alt="">
                                </div>

                                <div class="comments__author-name">
                                    <h3>Леонид оптимист</h3>
                                    <div class="comments__type comments__type-neg">
                                        Отрицательный
                                    </div>
                                </div>
                            </div>
                            <div class="comment__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                                    gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                            </div>
                        </div>
                    </div>
                    <div class="pagination__wrap">
                        <div class="pagination">
                            <div class="pagination-control pagination-control__left">
                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
                                            c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
                                            c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
                                            c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z" />
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
                                </svg></div>
                            <div class="pagination__num">
                                <ol>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>...</li>
                                    <li><a href="">100</a></li>
                                </ol>
                            </div>
                            <div class="pagination-control pagination-control__right">
                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
       c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
       c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
       c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z" />
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php };?>
    </main>

    <?php require_once('INC/footer.php')?>

    <div class="pop-edu__vie-wrap pop-edu__vie-see">
        <div class="pop-edu__vie">
            <div class="pop-edu__vie-exit">
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
            <div class="pop-edu__vie-content">
                <div class="pop-edu__vie-pic">
                    <img src="" alt="">
                </div>
                <div class="pop-edu__vie-bottom">
                    <div class="pop-edu__vie-pic-control"></div>
                    <div class="pop-edu__vie-desc">
                        <div class="pop-edu__vie-title">
                            <h3>Lorem ipsum</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, molestiae cum quos laudantium
                            cupiditate voluptatum a explicabo fugit et labore deleniti ea mollitia quaerat pariatur quam
                            provident expedita optio aut?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="JS/system.js"></script>

    <script src="JS/portfol.js"></script>
    <script src="JS/kids.js"></script>
</body>

</html>