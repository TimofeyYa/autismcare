<?php
   session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }
    
    require_once 'vendor/connect.php';
    $pageName = "Личный кабинет";

    $main_number =  $_SESSION['user']['main_number'];
    $check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc( $check_user);

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
                            <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">
                        </div>
                        <div class="aboutUser__btn">
                            <?php if(isset($_GET['edit'])){?>
                            <button onclick="document.location.href = 'profil.php';"
                                class="main-btn__gra profil_edit-btn__back">Вернуться</button>
                            <?php };?>
                            <?php if(!isset($_GET['edit'])){?>
                            <button onclick="document.location.href = 'profil.php?edit';"
                                class="main-btn__gra profil_edit-btn">Редактировать</button>
                            <?php };?>
                        </div>
                        <div class="aboutUser__stat">
                            <?php if ($_SESSION['user']['type'] == 1){
                             ?>
                            <p>Отзывов на сайте: <span
                                    class="blue__color"><?php echo $_SESSION['user']['stat1'];?></span></p>
                            <p>Клиентов: <span class="blue__color"><?php echo $_SESSION['user']['stat2'];?></span></p>
                            <?php };?>
                            <?php if ($_SESSION['user']['type'] == 2){
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
                                <h2><?php echo $_SESSION['user']['full_name']; ?></h2>
                            </div>
                            <div class="aboutUser__name-bottom">
                                <h3 class="blue__color "> <?php if ($_SESSION['user']['type'] == 1){?>Специалист<?php };
                                 if($_SESSION['user']['type'] == 2){ ?>Клиент<?php }; ?></h3>
                            </div>
                        </div>
                        <div class="aboutUser__main-Info">
                            <div class="aboutUser__about">
                                <h3 class="aboutUser__sub-title">О себе</h3>
                                <p><?php echo $_SESSION['user']['about'];?></p>
                            </div>
                            <?php if ($_SESSION['user']['type'] == 1){
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
        <?php if(isset($_GET['edit']) ){?>
        <section class="edit">
            <div class="container">
                <div class="page__block editUser__wrap">
                    <form action="" method="POST" class="edit-form">
                        <div class="edit-block edit-photo">
                            <h3 class="aboutUser__sub-title">Аватар</h3>
                            <input name="avatar" type="file" accept=".jpg, .png, .gif" class="edit-avatar">

                            <div class="file__preview"><img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>"
                                    alt='фото'></div>
                        </div>
                        <div class="edit-block edit-about">
                            <h3 class="aboutUser__sub-title">О себе</h3>
                            <textarea class="edit-aboutme" name="aboutme" id="" cols="30"
                                rows="10"><?php echo $_SESSION['user']['about'];?></textarea>
                        </div>
                        <?php if ($_SESSION['user']['type'] == 1){
                        ?>
                        <div class="edit-block edit-edu">
                            <h3 class="aboutUser__sub-title">Образование</h3>
                            <div class="edu__block">
                                <?php while ($rowArea = mysqli_fetch_array($check_userEduArea)) {?>
                                <div class="edu-block"><textarea name="edu-<?php echo $rowArea['numEdu'];?>"
                                        class="edu edu-textarea" id="" cols="30"
                                        rows="10"><?php echo $rowArea['content'];?></textarea>
                                    <div class="edu-number"><?php echo $rowArea['numEdu'];?></div>
                                </div>
                                <?php };?>
                            </div>

                            <div class="edit-edu__add">
                                <button class="main-btn__gra" type="button">+ Добавить</button>
                            </div>
                        </div>
                        <?php };?>
                        <div class="edit-edu__save">
                            <button class="main-btn__gra" type="submit">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="JS/editprofil.js"></script>
        <?php };?>
        <?php if(isset($_GET['SeeAllPort']) ){?>
        <section class="portfolAll">
            <div class="container">
                <div class="page__block portfol__wrap">
                    <div class="portfol__top">
                        <h2 class="section-title">Портфолио</h2>
                        <a href="profil.php" class="blue__color portfolSeeAll">Вернуться</a>
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
                       <?php if (mysqli_num_rows($check_userPort) < 16){ ?> 
                        <div class="portfol__block portfol__block-add">
                            <img src="source/ico/add.png" alt="">
                        </div>
                        <?php };?>
                    </div>
                </div>
            </div>
        </section>

        <?php };?>


        <?php if(!isset($_GET['edit']) && !isset($_GET['SeeAllPort'])){?>

        <?php if ($_SESSION['user']['type'] == 1){
            ?>
        <section class="portfol">
            <div class="container">
                <div class="page__block portfol__wrap">
                    <div class="portfol__top">
                        <h2 class="section-title">Портфолио</h2>
                        <a href="?SeeAllPort" class="blue__color portfolSeeAll">Посмотреть всё</a>
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
                        if (($i == 4) && (mysqli_num_rows($check_userPort) < 16))
                            break;
                            if (($i == 5) && (mysqli_num_rows($check_userPort) > 16))
                            break;
                        };?>
                        <?php if (mysqli_num_rows($check_userPort) < 16){ ?> 
                        <div class="portfol__block portfol__block-add">
                            <img src="source/ico/add.png" alt="">
                        </div>
                        <?php };?>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>
        <?php if ($_SESSION['user']['type'] == 2){
            ?>
        <section class="kids">
            <div class="container">
                <div class="page__block kids__wrap">
                    <div class="kids__top">
                        <h2 class="section-title">Дети</h2>
                        <a href="?addKid" class="blue__color">Добавить</a>
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
                                <a href="?editKid=<?= $kid['id']?>" class="main-btn__gra">Редактировать</a>
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
            <a href="?editportitem=1" class="pop-edu__vie-edit">
<svg height="492pt" viewBox="0 0 492.49284 492" width="492pt" xmlns="http://www.w3.org/2000/svg"><path d="m304.140625 82.472656-270.976563 270.996094c-1.363281 1.367188-2.347656 3.09375-2.816406 4.949219l-30.035156 120.554687c-.898438 3.628906.167969 7.488282 2.816406 10.136719 2.003906 2.003906 4.734375 3.113281 7.527344 3.113281.855469 0 1.730469-.105468 2.582031-.320312l120.554688-30.039063c1.878906-.46875 3.585937-1.449219 4.949219-2.8125l271-270.976562zm0 0"/><path d="m476.875 45.523438-30.164062-30.164063c-20.160157-20.160156-55.296876-20.140625-75.433594 0l-36.949219 36.949219 105.597656 105.597656 36.949219-36.949219c10.070312-10.066406 15.617188-23.464843 15.617188-37.714843s-5.546876-27.648438-15.617188-37.71875zm0 0"/></svg>
<p>Редактировать</p>
            </a>
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

    <div class="pop-edu__vie-wrap pop-edu__vie-addport" >
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
            <div class="pop-edu__vie-add-title">
                <h2>Добавть в портфолио</h2>
            </div>
            <form id="portForm" class="portForm" action="">
                <div class="pop-edu__vie-content pop-edu__vie-content-add">
                    <div class="pop-edu__add-pic-block">
                        <div class="pop-edu__add-pic">
                            <input class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="" class="input__add-viepic" alt="">
                            <div class="delitPicPort-btn">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        </div>
                        <div class="pop-edu__add-pic">
                            <input  class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="" class="input__add-viepic" alt="">
                            <div class="delitPicPort-btn">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        </div>
                        <div class="pop-edu__add-pic">
                            <input class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="" class="input__add-viepic" alt="">
                            <div class="delitPicPort-btn">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        </div>
                    </div>
                    <div class="pop-edu__add-desc">
                        <div class="pop-edu__add-tit">
                            <input required name="portTitle" class="input__add-port-title" maxlength="50" placeholder="Впишите название|" type="text">
                        </div>
                        <textarea placeholder="Здесь вы можете рассказать больше" maxlength="500" name="portDesc" class="textarea__add-port" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="main-btn__gra btn__add-port">+Добавить</button>
                </div>
            </form>
        </div>
    </div>

    <?php if(isset($_GET['editportitem'])){
        $id = $_GET['editportitem'];
        $check_editUserPort = mysqli_query($connect_users, "SELECT * FROM `accaunts-port` WHERE `id` = '$id'");

        $editAssoc = mysqli_fetch_assoc($check_editUserPort);
        ?>
    <div class="pop-edu__vie-wrap pop-edu__vie-editport" style='display:flex'>
        <div class="pop-edu__vie">
            <div class="pop-edu__vie-exit pop-edu__vie-exit-editport">
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
            <div class="pop-edu__vie-add-title">
                <h2>Редактировать</h2>
            </div>
            <form id="portForm" class="editPortForm" action="">
                <div class="pop-edu__vie-content pop-edu__vie-content-add">
                    <div class="pop-edu__add-pic-block">
                        <div class="pop-edu__add-pic">
                            <input  class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="uploads/<?= $editAssoc['img-1']?>" class="input__add-viepic" alt="">
                            <input type="hidden" class="isDelite" name ='isDelite3' value="<?php if ($editAssoc['img-1'] == ''){?>1<?php };?>">
                            <div class="delitPicPort-btn <?php if ($editAssoc['img-1'] != ''){?>delitPicPort-btnEdit<?php };?>">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        <div class="pop-edu__add-pic">
                            <input  class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="uploads/<?= $editAssoc['img-2']?>" class="input__add-viepic" alt="">
                            <input type="hidden" class="isDelite" name ='isDelite4' value="<?php if ($editAssoc['img-2'] == ''){?>1<?php };?>">
                            <div class="delitPicPort-btn <?php if ($editAssoc['img-2'] != ''){?>delitPicPort-btnEdit<?php };?>">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        </div>
                        <div class="pop-edu__add-pic">
                            <input class="input__add-port-file" type="file" accept=".jpg, .png, .gif">
                            <img src="uploads/<?= $editAssoc['img-3']?>" class="input__add-viepic" alt="">
                            <input type="hidden" class="isDelite" name ='isDelite5' value="<?php if ($editAssoc['img-3'] == ''){?>1<?php };?>">
                            <div class="delitPicPort-btn <?php if ($editAssoc['img-3'] != ''){?>delitPicPort-btnEdit<?php };?>">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 26 26" style="enable-background:new 0 0 26 26;" xml:space="preserve">
                           <g>
                               <path  d="M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25
                                   C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M18.78,17.394l-1.388,1.387c-0.254,0.255-0.67,0.255-0.924,0
                                   L13,15.313L9.533,18.78c-0.255,0.255-0.67,0.255-0.925-0.002L7.22,17.394c-0.253-0.256-0.253-0.669,0-0.926l3.468-3.467
                                   L7.221,9.534c-0.254-0.256-0.254-0.672,0-0.925l1.388-1.388c0.255-0.257,0.671-0.257,0.925,0L13,10.689l3.468-3.468
                                   c0.255-0.257,0.671-0.257,0.924,0l1.388,1.386c0.254,0.255,0.254,0.671,0.001,0.927l-3.468,3.467l3.468,3.467
                                   C19.033,16.725,19.033,17.138,18.78,17.394z"/>
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
                        </div>
                    </div>
                    <div class="pop-edu__add-desc">
                        <input type="hidden" class="editPortFormId"  name="editPortId" value="<?php echo $editAssoc['id'];?>">
                        <div class="pop-edu__add-tit">
                            <input required name="portTitle" maxlength="50" value="<?= $editAssoc['title']?>" class="input__add-port-title" placeholder="Впишите название|" type="text">
                        </div>
                        <textarea placeholder="Здесь вы можете рассказать больше" maxlength="500" name="portDesc" class="textarea__add-port" id="" cols="30" rows="10"><?= $editAssoc['descr']?></textarea>
                    </div>
                    <div class="portEditBottomControl">
                        <button type="submit" class="main-btn__gra btn__add-port">Изменить</button>
                        <div class="portItemEditDelite">Удалить запись</div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

    <?php };?>

    <?php if(isset($_GET['addKid'])){
 
        
        
        ?>
        <div class="popup__add-kid">

            <div class="add-kid__wrap">
                <div class="add-kid-exit">
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
                <div class="pop-edu__vie-add-title">
                    <h2>Добавить ребёнка</h2>
                </div>
                <div class="add-kid__content">      
                    <form class="add-kid__form">
                        <div class="add-kid__form-top">
                            <input required type="text" name="name" placeholder="Имя ребёнка">
                            <input required type="text" name="old" placeholder="Возраст" class="oldKid" id="oldKid">
                            <div class="add-kid__form-doc">
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="957.599px" height="957.6px" viewBox="0 0 957.599 957.6" style="enable-background:new 0 0 957.599 957.6;"
                                    xml:space="preserve">
                                <g>
                                    <path d="M817.9,108.4h-28v687.901c0,45.699-37.2,82.898-82.899,82.898H423.3H197.7v25.5c0,29.201,23.7,52.9,52.9,52.9h283.6H817.8
                                        c29.2,0,52.899-23.699,52.899-52.9V161.3C870.7,132.1,847.1,108.4,817.9,108.4z"/>
                                    <path d="M423.3,849.199h283.6c29.2,0,52.9-23.699,52.9-52.898V108.4V52.9c0-29.2-23.7-52.9-52.9-52.9H423.3H329v17.5
                                        c0.199,1.8,0.3,3.7,0.3,5.6v115.3V168c0,41.1-33.4,74.5-74.5,74.5h-29.6H109.9c-1.5,0-3.1-0.1-4.6-0.2H86.9v554.001
                                        c0,29.199,23.7,52.898,52.9,52.898h58H423.3L423.3,849.199z M434,669.4H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25h185
                                        c13.8,0,25,11.199,25,25C459.1,658.199,447.8,669.4,434,669.4z M619,541.801H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25
                                        H619c13.8,0,25,11.199,25,25C644,530.6,632.8,541.801,619,541.801z M249.1,356.3H619c13.8,0,25,11.2,25,25c0,13.8-11.2,25-25,25
                                        H249.1c-13.8,0-25-11.2-25-25C224.1,367.5,235.3,356.3,249.1,356.3z"/>
                                    <path d="M109.9,212.5h144.9c0.1,0,0.3,0,0.4,0c24.2-0.2,43.8-19.8,44-44c0-0.1,0-0.3,0-0.4v-145c0-13.4-11-22.3-22.399-22.3
                                        c-5.5,0-11,2-15.6,6.6L94.1,174.5C80.1,188.5,90,212.5,109.9,212.5z"/>
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
                                Добавить документы
                                <input class="add-kid__form-file" type="file" accept=".zip, .rar">
                            </div>
                        </div>
                        <div class="add-kid__form-bottom">
                            <textarea required name="about" maxlength="700" name="" id="" cols="30" rows="10" placeholder="Расскажите о ребёнке"></textarea>
                            <button class="main-btn__gra add-kid__form-sub">+ Добавить</button>
                        </div>
                    </form>
             </div>
            </div>
            
        </div>
    <?php };?>

    <?php if (isset($_GET['editKid'])){
        $id = $_GET['editKid'];
        $check_editUserKid = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `id` = '$id'");

        $editAssocKid = mysqli_fetch_assoc($check_editUserKid);
        
        ?>
        <div class="popup__add-kid">

            <div class="add-kid__wrap">
                <div class="add-kid-exit">
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
                <div class="pop-edu__vie-add-title">
                    <h2>Редактировать запись о ребёнке - <span><?php echo $editAssocKid['name'];?></span></h2>
                </div>
                <div class="add-kid__content">      
                    <form class="eidt-kid__form">
                        <input type="hidden" class="editKidId" name='id' value="<?php echo $editAssocKid['id'];?>">
                        <div class="add-kid__form-top">
                            <input required type="text" name="name" placeholder="Имя ребёнка" value="<?php echo $editAssocKid['name'];?>">
                            <input required type="text" name="old" placeholder="Возраст" class="oldKid" id="oldKid" value="<?php echo $editAssocKid['old'];?>">
                            <?php if(empty($editAssocKid['document'])){?>
                            <div class="add-kid__form-doc">
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="957.599px" height="957.6px" viewBox="0 0 957.599 957.6" style="enable-background:new 0 0 957.599 957.6;"
                                    xml:space="preserve">
                                <g>
                                    <path d="M817.9,108.4h-28v687.901c0,45.699-37.2,82.898-82.899,82.898H423.3H197.7v25.5c0,29.201,23.7,52.9,52.9,52.9h283.6H817.8
                                        c29.2,0,52.899-23.699,52.899-52.9V161.3C870.7,132.1,847.1,108.4,817.9,108.4z"/>
                                    <path d="M423.3,849.199h283.6c29.2,0,52.9-23.699,52.9-52.898V108.4V52.9c0-29.2-23.7-52.9-52.9-52.9H423.3H329v17.5
                                        c0.199,1.8,0.3,3.7,0.3,5.6v115.3V168c0,41.1-33.4,74.5-74.5,74.5h-29.6H109.9c-1.5,0-3.1-0.1-4.6-0.2H86.9v554.001
                                        c0,29.199,23.7,52.898,52.9,52.898h58H423.3L423.3,849.199z M434,669.4H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25h185
                                        c13.8,0,25,11.199,25,25C459.1,658.199,447.8,669.4,434,669.4z M619,541.801H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25
                                        H619c13.8,0,25,11.199,25,25C644,530.6,632.8,541.801,619,541.801z M249.1,356.3H619c13.8,0,25,11.2,25,25c0,13.8-11.2,25-25,25
                                        H249.1c-13.8,0-25-11.2-25-25C224.1,367.5,235.3,356.3,249.1,356.3z"/>
                                    <path d="M109.9,212.5h144.9c0.1,0,0.3,0,0.4,0c24.2-0.2,43.8-19.8,44-44c0-0.1,0-0.3,0-0.4v-145c0-13.4-11-22.3-22.399-22.3
                                        c-5.5,0-11,2-15.6,6.6L94.1,174.5C80.1,188.5,90,212.5,109.9,212.5z"/>
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
                                Добавить документы
                               
                                <input class="add-kid__form-file" type="file" accept=".zip, .rar" >
                                
                            </div>
                            <?php } else {?>
                                <div class="add-kid__form-doc add-kid__form-doc-upload">
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="957.599px" height="957.6px" viewBox="0 0 957.599 957.6" style="enable-background:new 0 0 957.599 957.6;"
                                    xml:space="preserve">
                                <g>
                                    <path d="M817.9,108.4h-28v687.901c0,45.699-37.2,82.898-82.899,82.898H423.3H197.7v25.5c0,29.201,23.7,52.9,52.9,52.9h283.6H817.8
                                        c29.2,0,52.899-23.699,52.899-52.9V161.3C870.7,132.1,847.1,108.4,817.9,108.4z"/>
                                    <path d="M423.3,849.199h283.6c29.2,0,52.9-23.699,52.9-52.898V108.4V52.9c0-29.2-23.7-52.9-52.9-52.9H423.3H329v17.5
                                        c0.199,1.8,0.3,3.7,0.3,5.6v115.3V168c0,41.1-33.4,74.5-74.5,74.5h-29.6H109.9c-1.5,0-3.1-0.1-4.6-0.2H86.9v554.001
                                        c0,29.199,23.7,52.898,52.9,52.898h58H423.3L423.3,849.199z M434,669.4H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25h185
                                        c13.8,0,25,11.199,25,25C459.1,658.199,447.8,669.4,434,669.4z M619,541.801H249.1c-13.8,0-25-11.201-25-25c0-13.801,11.2-25,25-25
                                        H619c13.8,0,25,11.199,25,25C644,530.6,632.8,541.801,619,541.801z M249.1,356.3H619c13.8,0,25,11.2,25,25c0,13.8-11.2,25-25,25
                                        H249.1c-13.8,0-25-11.2-25-25C224.1,367.5,235.3,356.3,249.1,356.3z"/>
                                    <path d="M109.9,212.5h144.9c0.1,0,0.3,0,0.4,0c24.2-0.2,43.8-19.8,44-44c0-0.1,0-0.3,0-0.4v-145c0-13.4-11-22.3-22.399-22.3
                                        c-5.5,0-11,2-15.6,6.6L94.1,174.5C80.1,188.5,90,212.5,109.9,212.5z"/>
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
                                Изменить документы
                               
                                <input class="add-kid__form-file" type="file" accept=".zip, .rar" >
                                
                            </div>
                                <?php };?>
                        </div>
                        <div class="add-kid__form-bottom">
                            <textarea required name="about" maxlength="700" name="" id="" cols="30" rows="10" placeholder="Расскажите о ребёнке" ><?php echo $editAssocKid['about'];?></textarea>
                            <div class="kidControlBtn">
                                <button class="main-btn__gra add-kid__form-sub">Изменить</button>
                                <div class="kidItemEditDelite">Удалить запись</div>
                            </div>
                            
                        </div>
                    </form>
             </div>
            </div>
            
        </div>
        <?php }?>
    
        <script src="JS/system.js"></script>
    <script src="JS/portfol.js"></script>
    <script src="JS/kids.js"></script>
</body>

</html>