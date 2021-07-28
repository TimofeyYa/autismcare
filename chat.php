<?php
   session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php');
    }
    
    require_once 'vendor/connect.php';
    $pageName = "Чат";


    $main_number =  $_SESSION['user']['main_number'];
    $check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$main_number'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc( $check_user);

        $_SESSION['user']['about'] = $user['about'];
        $_SESSION['user']['stat1'] = $user['stat1'];
        $_SESSION['user']['stat2'] = $user['stat2'];
        $_SESSION['user']['avatar'] = $user['avatar'];

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
    <link rel="stylesheet" href="CSS/chat.css">
    
</head>

<body>
    <?php require_once('INC/header.php')?>

    <?php require_once('INC/leftPanel.php')?>
    <main class="chat">
        <?php if (!isset($_GET['mess'])){?>
        <section class="chats">
            <div class="container">
                <div class="page__block chats__wrap">
                    <div class="chats-block">
                        <div class="chats-block__pic">
                            <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">
                        </div>
                        <div class="chats-block__text">
                        <div class="chats-block__name">
                            <h3>Ян Динилов</h3>
                        </div>
                        <div class="chats-block__lastmes">
                            <p>Какой то текст</p>
                        </div>
                        <div class="chats-block__date">
                            <time>09.10.2020</time>
                        </div>
                    </div>
                    </div>
                    <div class="chats-block">
                        <div class="chats-block__pic">
                            <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">
                        </div>
                        <div class="chats-block__text">
                        <div class="chats-block__name">
                            <h3>Ян Динилов</h3>
                        </div>
                        <div class="chats-block__lastmes">
                            <p>Какой то текст</p>
                        </div>
                        <div class="chats-block__date">
                            <time>09.10.2020</time>
                        </div>
                    </div>
                    </div>
                    <div class="chats-block">
                        <div class="chats-block__pic">
                            <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">
                        </div>
                        <div class="chats-block__text">
                        <div class="chats-block__name">
                            <h3>Ян Динилов</h3>
                        </div>
                        <div class="chats-block__lastmes">
                            <p>Какой то текст</p>
                        </div>
                        <div class="chats-block__date">
                            <time>09.10.2020</time>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>
        <?php if (isset($_GET['mess'])){?>
            <section class="messager">
                <div class="container">
                    <div class="page__block messager__wrap">
                        <div class="messager__back">
                            <a href="chat.php">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
<g>
	<g>
		<path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
			c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
			c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
			c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
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
Назад

</a>
                        </div>
                        <div class="messager__content">
                            <div class="messager__top">
                                <div class="chats-block">
                                    <div class="chats-block__pic">
                                        <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">
                                    </div>
                                    <div class="chats-block__text">
                                    <div class="chats-block__name">
                                        <h3>Ян Динилов</h3>
                                    </div>
                                    <div class="chats-block__lastmes">
                                        <a href="user.php">Перейти в профиль</a>
                                    </div>
                                </div>
                            </div>
                            <div class="messager__chat">
                                
                            </div>
                            <div class="messager__control">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }?>
</main>
    <?php require_once('INC/footer.php')?>
    <script src="JS/system.js"></script>

</body>

</html>