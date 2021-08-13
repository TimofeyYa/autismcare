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
    
   <main class="classroom">
    <section class=" aboutUser">
        <div class="container">
        <div class="page__block aboutUser__wrap">
            
        </div>
        </div>
    </section>
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