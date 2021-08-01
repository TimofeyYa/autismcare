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
                            <div class="quesList-block quesList-block__spec">
                                <div class="quesList-block__title">
                                    <h2>Привет мир</h2>
                                </div>
                                <div class="quesList-block__name">Анна Каренина</div>
                                <div class="quesList-block__desc">
                                    <p>Привет мир</p>
                                </div>
                                <div class="quesList-block__btns">
                                    <button class="main-btn__gra">Отправить анкету</button>
                                    <a href="user.php?userid">Посмотреть профиль</a>
                                    <a href="#">Посмотреть полностью</a>
                                </div>
                            </div>

                            <div class="quesList-block quesList-block__pas">
                                <div class="quesList-block__title">
                                    <h2>Привет Мир</h2>
                                </div>
                                <div class="quesList-block__name">Анна Уаренина</div>
                                <div class="quesList-block__desc">
                                    <p>Привет мир</p>
                                </div>
                                <div class="quesList-block__sub-title">
                                    <h3>Дети</h3>
                                </div>
                                <div class="quesList-block__kids-list">
                                    <ol>

                                        <li>Привет мир<a href="#">Подробнее</a></li>


                                    </ol>
                                </div>
                                <div class="quesList-block__btns">
                                    <button class="main-btn__gra">Отправить анкету</button>
                                    <a href="user.php?userid=">Посмотреть профиль</a>
                                    <a href="#">Посмотреть полностью</a>
                                </div>
                            </div>
                        </div>
                        <div class="ancets__content-my">
                            <div class="quesList-block quesList-block__spec">
                                <div class="quesList-block__title">
                                    <h2>Привет мир</h2>
                                </div>
                                <div class="quesList-block__name">Анна Каренина</div>
                                <div class="quesList-block__desc">
                                    <p>Привет мир</p>
                                </div>
                                <div class="quesList-block__status">
                                  <div class="quesList-block__status-ok">Текущий статус</div>

                                </div>
                            </div>

                            <div class="quesList-block quesList-block__pas">
                                <div class="quesList-block__title">
                                    <h2>Привет Мир</h2>
                                </div>
                                <div class="quesList-block__name">Анна Уаренина</div>
                                <div class="quesList-block__desc">
                                    <p>Привет мир</p>
                                </div>
                                <div class="quesList-block__sub-title">
                                    <h3>Дети</h3>
                                </div>
                                <div class="quesList-block__kids-list">
                                    <ol>

                                        <li>Привет мир<a href="#">Подробнее</a></li>


                                    </ol>
                                </div>
                                <div class="quesList-block__status">
                                    <div class="quesList-block__status-none">Текущий статус</div>
  
                                  </div>
                            </div>
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