<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}

require_once 'vendor/connect.php';
$pageName = "Личный кабинет";

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
    <link rel="stylesheet" href="CSS/classroom.css">

</head>

<body>
    <?php require_once('INC/header.php') ?>

    <?php require_once('INC/leftPanel.php') ?>

    <main class="classroom">
        <section class=" aboutUser">
            <div class="container">
                <div class="page__block classroom__wrap">
                    <div class="classroom__video">
                    <iframe allowfullscreen="allowfullscreen" width="720" height="405" allow="microphone; camera; autoplay; display-capture" src="http://192.168.56.1:8080/c/7846413672"></iframe>
                    </div>
                    <div class="classroom__control">
                        <div class="classroom__control-timer">
                            <p id='63'></p>
                        </div>
                        <div class="classroom__control-items">
                            <div class="classroom__items-wrap">
                                <div class="classroom__item">
                                    <div class="classroom__item-left">
                                    <div class="classroom__item-pic">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="21" viewBox="0 0 24 21">
                                            <image id="speech" width="24" height="21" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAVCAYAAABc6S4mAAAC7UlEQVQ4jZWUYWiVVRjH/65MFGJWiqDf/LA2imptbVwJ9YuRbG8UVEK0gkjCQQiCEdIHTawPfepDoCCKQYKaDBSkti+LMug6kGJeYjKSTeiLSyeye99znvP/x9l971j33nd2Dzw8D+857+9//s8577sKLY59I7dWA9gL4CUATd83IZj0sxfOPNqqAIBTAN6tfygAQREuuBjEB456piUH+0ZuPQHgn3pwhJoAxwiv5rQa5VYdtNcKZuC467QRjEo11uYKJEnyFID3SLZ770dGR0d/XwTHNqC640VwBq9Bl+Chmpu2KEmSzQCKZrbFew/vPZ1zb3YdPHvdiL9SZWBi+W7/U5ezyHMw7L3f4pxDJtDmnDv6wLTLZfCUWIIth5dDBHMRLoptzehpmm5K0xR1sen821v/vm/89Z4Jd43V8NWY8wF3fMCcBSxYgCwAZhebOkjT9Ir3/sNlDuCcuxLn7nq+UaG+rBCvVcgNZWquTN2ODkBWD4kUqF9AHsq9pj09PZ845z713j8eD9k5t3d2dnZ+6Todv/FdOehJRw7h4+fu5HGaOkiSZDeAZyX9QfIRkqslvd/Z2XlibGwsjWvmfTgH6jL2P688OOo/9SRJ1kv6RtI7JCEJMS+rL0jaMz4+vgQtFAqPSRomea1YLF7NdTA4OPhKCOE0yc01cBOBtyRNAvg8vtPf37/KzE5KGiJ5HcCLDQIDAwPrSH5lZsN1sIacPTvS19d3o1gsXjSzYySHsvmvm56BmV0l+UK26HtJf5L8bAWBmL/t7u7eZmYHaqKTk5Nn8gTWZ4sWSH4haUeeE5K/ZXW/pBr8VKlUOpx3yG1mtt3MbprZOjMbN7OXzQzNIoRQMbPXzex2Nv+DmX300FtUKBQ2SvqRZPcKbYn5p1KptLOjo+NpSQMkj09PTy88VCCO3t7edpKXJG1fSWBqamrnSsCGFtWKiYmJeTN71czO5rUoRquj4VfR1dW1huTanFbZzMzMg/8tAuBf6ktJsXPqwcwAAAAASUVORK5CYII=" />
                                        </svg>
                                    </div>
                                    <p>Речь</p>
                                    </div>
                                    <div class="classroom__item-settings">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 18 18">
                                            <image id="settings" width="18" height="18" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAACAklEQVQ4jXXUS4iPURgG8N8w5U4s3ItyDROZyS0rC5fCQjbYsBAJmYlIIaWEGAsruUUSG4oSyV0y/cetYUGuuRWKEGWjd3r/9c2/8dTpO997znl6z/O876mqrd3nP+iKo5iE71iPK5VbS6X61m+HinhvDM/5QgzBgiTcnfFeGFlJWCSagRdoxgXsRBMe4CLG4WzuaUryjpVE3XAGazAW77EE63L9GYaiBQ0YkVdeXiaqzm/nJHuMd1hRyDTiv/EBWzIWmbxC/8qMvuI0NhcIQpvn+IkfOIjuuTYFs3CgSBSLq1KjExmfj8PYhE4Yj8GpURXu4jW219U11saBsP8YhuE2tuIvHmIPThYy7JxCL8YNzMNcLAoXQ6MJKer1wqFw6FKFw39wDTVJdD5HXHN0XO0LZmegjE/t1QpG4WPO46pzMCg4gmgDJmZGNbkp9NmPPgWStRhYyPQ4GmOUSvUt1VlwM3EobV+NHVnVYfGdnPdIXcLFMZiOvqVS/bei/V3Sqeb8D8GXYmoK3pBXvZ/rIcfbbKNWlAsySqAnbmWxhWZX8TRHGbXZwOHeo8y0DdFn7Eo3nmBaVvNGHEE/nEs3w7174RRWFguyjG2pz+V0JMQOVwLRWwOyJZbhJiZnAm0yKiMqt4xTiMfmTT4ve/ErX4YYbVBJVMTL7Pio+tAlWqJ94B9Y5HVwdxBUIwAAAABJRU5ErkJggg==" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="classroom__control-setting">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34">
                                    <image id="settings" width="34" height="34" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAiCAYAAAA6RwvCAAAD1UlEQVRYhbVXS0hVURRdL1DDLBtkKTqJJFQQBSGhaKADq1mDBkXQSCIIokGjoFEQQQTOGvShAkmHQpFObNJAiKSg6E8fBIuwjMR6pa7YsG5tj+derw/bsHn3nbX25+x7zj7nFkiiRKkG0AVgo8ynAdwD8K0kd5ZICbqT5BSXypSwFfsspSIFAC8BNAJ4BOCxxtsAtAN4DWC7zXE1K7KBZG0wVq86fCVZ4cYrNEZxvE2tfKXGWpOSXyWAmwC+ApgEMA6gGUAtgGPi2FooOpuiWx/HxG2W7aR83ZDvXBWpJDmqmc2RnNHzNMmiWxX3I7b3HV6UDeVjTs+jirHINnRka+auDD6TbFNJR12AEZIHSa6LJLJO2Ijjj8pHm3xSMQpZiXS52bcGVTpFsnMFO6FTNn72ra5KXVmJ9Io0UOK2zqMDitGblcgOkX6S7P4PSXTLNxUrNRHTqyLORrZhonUkz5IcJ/lFOq6xuhSbevmkYmQuVtNdIv8guSmC97qdFJOZsOzSTfJJxVg2kX6R+yLYCRf4Dsl9JDdL92kskRMR+z5h/WmJtJMcIvmK5G+RmwKyceYzgoTJzsvGY03CfivWUMIxsJHk96DEDyIBhoRdyrEoL4k7FMEeBLEsdqMBFzRgTahDjSfsfFXqlAskG3Ik0iBuUbYeq1SMDtf4LthZU6NuPwDgoU7T2eAksJO2HMALABM5ztIJcctl62VWMR4qpkmNP/Syju0q/U7nSCKRhFuVwfkb0xJZ0LPduNJkUuPbZLOcrBEXzjYmScwFe2dH3flyWVvsQPBe7YD6IN6eHGtkj7gfwsNNvvsUKzl3jhpQRvJ2sJK/BZce0zPCnpOszkiiWhzKxmMV8u3FYpf5GdtpeJzkW5H2R3ZOEsDaeXMkiWZhScLhjtkvzGIcV8xCWmc9LfJYBLOe8064XXSGSZ6TDrvLzztxQ/sx4afztPjdrmyxWdeQvKY+EcqCsJqUaiWyO8TDW7xttWcAGvSNshfAr5QVv0X4Vv1/C2AYwKcUfrnwLvUZu8/O/NvIS1e0ydPYvXIV1Hw+UYxFOzPsCevd3g+762qI+fwYxIpWpN7d1M+7cbtZTZC8RbIlR2VaxJ0Ibnrn5bsYXrpiTg65496azkl3s0pkLNL0klc7FnBn5eOy/s8rxrK7xvSw24qJ2KX3prtzvonYvRH2U9yBwMecfC+JmVVe+xy4QnKQ5BHXqlvk9H3E5r2w5PUVZDsoX6mfI6XshA0qr82uh+RGaY/G5pf7zl2tREyvR5pZIoat2GepiawleVGvwk5QU3u2McNW5o/EHyu+lnfjZpgWAAAAAElFTkSuQmCC" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="classroom__comment">
                        <textarea maxlength="300" name="" id=""></textarea>
                        <button>Добавить</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once('INC/footer.php') ?>


    <script src="JS/system.js"></script>
    <script src="JS/classroom.js"></script>
</body>

</html>