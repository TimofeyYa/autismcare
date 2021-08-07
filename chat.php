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

   $messId = $_GET['mess'];
   
   $check_userMess = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `main_number` = '$messId'");
   $check_userMess = mysqli_fetch_assoc($check_userMess);

   $check_userMessInfo = mysqli_query($connect_users, "SELECT * FROM `accaunts-info` WHERE `main_number` = '$messId'");
   $check_userMessInfo = mysqli_fetch_assoc($check_userMessInfo);

   if ($messId > $main_number){
       $chatId = $messId + $main_number ;
   } else {
       $chatId =  $main_number + $messId ;
   }


   $check_chatMess = mysqli_query($connect_users, "SELECT * FROM `chat__message` WHERE `chat_number` = '$chatId'");

   $myChats1 = mysqli_query($connect_users, "SELECT * FROM `chat__create` WHERE `main_number1` = '$main_number' OR `main_number2` = '$main_number'");
   
   
   $check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$main_number'");
     $check_userQuest = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `main_number` = '$main_number'");
     if (mysqli_num_rows($check_userQuest) > 0){
        $userQuest = mysqli_fetch_assoc($check_userQuest);


    }
    if ($check_userMess['type'] == 2){
        $check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$messId'");
        $spec_number = $main_number;
        $passient_number = $messId;
    }else
    if ($_SESSION['user']['type'] == 2){
        $check_userKids = mysqli_query($connect_users, "SELECT * FROM `accaunts-kids` WHERE `main_number` = '$main_number'");
        $spec_number = $messId;
        $passient_number = $main_number;
    } else {
        $check_userKids = 'none';
    }
    if ($_SESSION['user']['type'] == 2 && $check_userMess['type'] == 2){
        $check_userKids = 'none';
    }
    
    $serviceId = time() + $main_number;
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
                    <?php while($chatUser = mysqli_fetch_array($myChats1)){
                        if ($chatUser['main_number2'] != $main_number){
                            $userMainNum = $chatUser['main_number2'];
                        $userChatNum = $chatUser['chat_number'];
                        }else{
                            $userMainNum = $chatUser['main_number1'];
                            $userChatNum = $chatUser['chat_number'];
                        }
                        

                        $checkAcc = mysqli_query($connect_users,"SELECT * FROM `accaunts` WHERE `main_number`='$userMainNum'");
                        $checkAcc = mysqli_fetch_assoc($checkAcc);

                        $checkInfo = mysqli_query($connect_users,"SELECT * FROM `accaunts-info` WHERE `main_number`='$userMainNum'");
                        $checkInfo = mysqli_fetch_assoc($checkInfo);

                        $checkMess = mysqli_query($connect_users,"SELECT * FROM `chat__message` WHERE `chat_number`='$userChatNum'");

                        $lastMes;
                        $maxId = 0;
                        while ($whileId = mysqli_fetch_array($checkMess)){
                            if ($whileId['id'] > $maxId){
                                $lastMes = $whileId['message'];
                            }
                            
                        }
                        ?>
                    <a href="?mess=<?php echo $checkAcc['main_number'];?>" class="chats-block">
                        <div class="chats-block__pic">
                            <img src="uploads/<?php echo $checkInfo['avatar']; ?>" alt="">
                        </div>
                        <div class="chats-block__text">
                            <div class="chats-block__name">
                                <h3><?php echo $checkAcc['name'];?></h3>
                            </div>
                            <div class="chats-block__lastmes">
                                <p><?php echo $lastMes;?></>
                            </div>
                            <?php if ($chatUser['haveNew'] == 'yes'){?>
                            <div class="chats-block__date">
                                <time>Новое сообщение</time>
                            </div>
                            <?php }?>
                        </div>
                    </a>
                    <?php }?>
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
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.004 492.004"
                                style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
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
                            Назад

                        </a>
                    </div>
                    <div class="messager__content">
                        <div class="messager__top">
                            <div class="chats-block">
                                <div class="chats-block__pic">
                                    <img src="uploads/<?php echo $check_userMessInfo['avatar']; ?>" alt="">
                                </div>
                                <div class="chats-block__text">
                                    <div class="chats-block__name">
                                        <h3><?php echo $check_userMess['name']?></h3>
                                    </div>
                                    <div class="chats-block__lastmes">
                                        <a href="user.php?userid=<?php echo $messId;?>">Перейти в профиль</a>
                                    </div>
                                </div>
                            </div>
                            <div class="messager__chat">
                                <?php while ($message = mysqli_fetch_array($check_chatMess)){?>
                                <div class="messager__chat-block">
                                    <div
                                        class="messager__chat-mes <?php if ($message['main_number'] == $main_number){?>messager__chat-mes-me<?php } else{?>messager__chat-mes-user<?php }?>">
                                        <p><?php echo $message['message'];?></p>
                                    </div>
                                </div>
                                <?php }?>


                            </div>
                            <div class="messager__control">
                                <div class="messager-full">
                                    <div class="messager-full__wrap">
                                        <div class="messager-full__add">
                                            <?php if (isset($userQuest)){?><button class="addAncet"
                                                id="<?php echo $userQuest['id'];?>">Добавить анкету</button><?php };?>
                                                <?php if ($check_userKids != 'none'){?><button id="addServise" class="">Добавить услугу</button><?php };?>
                                            
                                            <input type="hidden" id='ancetInfo' value="">
                                            <input type="hidden" id='serviceInfo' value="">
                                        </div>
                                        <div class="messager-full__select"></div>
                                    </div>
                                </div>
                                <div class="messager__control-content">
                                    <input type="hidden" class="messId" value="<?php echo $messId;?>">
                                    <textarea class="messager__control-textarea" name="<?php echo $chatId;?>"
                                        id=""></textarea>
                                    <div class="messager__control-svg messager__control-send">
                                        <svg enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24"
                                            width="512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m8.75 17.612v4.638c0 .324.208.611.516.713.077.025.156.037.234.037.234 0 .46-.11.604-.306l2.713-3.692z" />
                                            <path
                                                d="m23.685.139c-.23-.163-.532-.185-.782-.054l-22.5 11.75c-.266.139-.423.423-.401.722.023.3.222.556.505.653l6.255 2.138 13.321-11.39-10.308 12.419 10.483 3.583c.078.026.16.04.242.04.136 0 .271-.037.39-.109.19-.116.319-.311.352-.53l2.75-18.5c.041-.28-.077-.558-.307-.722z" />
                                        </svg>

                                    </div>
                                    <div class="messager__control-svg messager__control-add">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 443.733 443.733"
                                            style="enable-background:new 0 0 443.733 443.733;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M187.733,0H17.067C7.641,0,0,7.641,0,17.067v170.667c0,9.426,7.641,17.067,17.067,17.067h170.667
			c9.426,0,17.067-7.641,17.067-17.067V17.067C204.8,7.641,197.159,0,187.733,0z M170.667,170.667H34.133V34.133h136.533V170.667z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M426.667,0H256c-9.426,0-17.067,7.641-17.067,17.067v170.667c0,9.426,7.641,17.067,17.067,17.067h170.667
			c9.426,0,17.067-7.641,17.067-17.067V17.067C443.733,7.641,436.092,0,426.667,0z M409.6,170.667H273.067V34.133H409.6V170.667z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M187.733,238.933H17.067C7.641,238.933,0,246.574,0,256v170.667c0,9.426,7.641,17.067,17.067,17.067h170.667
			c9.426,0,17.067-7.641,17.067-17.067V256C204.8,246.574,197.159,238.933,187.733,238.933z M170.667,409.6H34.133V273.067h136.533
			V409.6z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M426.667,324.267H358.4V256c0-9.426-7.641-17.067-17.067-17.067s-17.067,7.641-17.067,17.067v68.267H256
			c-9.426,0-17.067,7.641-17.067,17.067S246.574,358.4,256,358.4h68.267v68.267c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V358.4h68.267c9.426,0,17.067-7.641,17.067-17.067S436.092,324.267,426.667,324.267z" />
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
                                    <div class="messager__control-sercl"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <?php }?>
    </main>
    <?php require_once('INC/footer.php')?>

    <div class="popup__service-wrap">
        <div class="popup__service-content">
            <div class="popup__service-exit">
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
            <div class="popup__service-title">
                <h2>Предложить услугу</h2>
            </div>
            <div class="popup__service-form">
                <form action="">
                    
                    <input type="hidden" value="<?php echo $serviceId;?>" id="serviceId" name="serviceId">
                    <input type="hidden" value="<?php echo $spec_number;?>" class="spec_number" name="spec_number">
                    <input type="hidden" value="<?php echo $passient_number;?>" class="passient_number" name="passient_number">
                    <div class="popup__service-formTop">
                        <input type="text" maxlength="55" placeholder="Название для услуги" name="title" class="popup__service-inpTitle">
                        <input type="number" maxlength="6" name="cost" placeholder="Стоимость" class="popup__service-inpPrice">
                        <p>Рублей</p>
                    </div>
                    <div class="popup__service-formMidle">
                        <select name="type" >
                            <option id='once' selected value="1">Один раз</option>
                            <option id='week' value="2">Каждую неделю</option>
                        </select>
                        <div class="popup__service-formOnce">
                            <input type="date" name="date" class="popup__service-inpData">
                            <input type="time" name='dateTime' >
                        </div>
                    </div>
                    <div class="popup__service-formEvryWeek">
                        <div class="popup__service-weekDay">
                            <p>Понедельник</p>
                            <input type="time"  name="day1">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Вторник</p>
                            <input type="time" name="day2">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Среда</p>
                            <input type="time" name="day3">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Четверг</p>
                            <input type="time" name="day4">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Пятница</p>
                            <input type="time" name="day5">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Суббота</p>
                            <input type="time" name="day6">
                        </div>
                        <div class="popup__service-weekDay">
                            <p>Воскресенье</p>
                            <input type="time" name="day7">
                        </div>
                    </div>
                    <div class="popup__service-formComment">
                        <textarea name="comment" maxlength="499" id=""></textarea>
                    </div>
                    <div class="popup__service-formKid">
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
                   
                
                    </div>
                    <div class="popup__service-formBottom">
                        <div class="popup__service-duration">
                        <input name='duration' type="number" class="popup__service-inpduration" placeholder="60">
                        <p>Продолжительность в минутах</p>
                        </div>
                        <button type="submit" class="popup__service-btn">Предложить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="JS/system.js"></script>
    <script src="JS/chat.js"></script>
    <script>
        const messId = document.querySelector('.messId').value;
        const sendBtn = document.querySelector('.messager__control-send svg');
        const block = document.querySelector('.messager__chat');

        setTimeout(()=>{
            block.scrollTop = block.scrollHeight;
        }, 300)
        
        
        
        
        

        sendBtn.addEventListener('click', ()=>{
            show();
        })
        function show() {
            $.ajax({
                url: `messager.php?mess=${messId}`,
                cache: false,
                success: function (html) {
                    $(".messager__chat").html(html);
                }
            });
            setTimeout(()=>{
                
            if ((block.scrollHeight > block.scrollTop + block.offsetHeight) && (block.scrollHeight < block.scrollTop +
                    block.offsetHeight + 100)) {
                block.scrollTop = block.scrollHeight;
                
            }
            setEvent();
            }, 200)
            

        }

        $(document).ready(function () {
            show();
            setInterval('show()', 2200);



        });
        
        function setEvent(){
            const declineService = document.querySelectorAll('.declineService');
            const acceptService = document.querySelectorAll('.asseptService');
            
            declineService.forEach(item=>{
                item.addEventListener('click',()=>{
                    $thisId = item.id;

                    let dataMes = `id=${$thisId}`;

                    const request = new XMLHttpRequest();
                    request.open('POST', 'vendor/declineService.php');
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    request.send(dataMes);

            
         
                    request.addEventListener('load', () => {
                
                        if (request.status === 200) {
                            show();
                            // window.location.reload();
                        } else {
                            alert('Ошибка сервера, повторите попытку позже');
                        }
                    })
                })
            })

            acceptService.forEach(item=>{
                item.addEventListener('click',()=>{
                    $thisId = item.id;

                    let dataMes = `id=${$thisId}`;

                    const request = new XMLHttpRequest();
                    request.open('POST', 'vendor/acceptService.php');
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    request.send(dataMes);

            
         
                    request.addEventListener('load', () => {
                
                        if (request.status === 200) {
                            show();
                            // window.location.reload();
                        } else {
                            alert('Ошибка сервера, повторите попытку позже');
                        }
                    })
                })
            })
        }
    </script>
</body>

</html>