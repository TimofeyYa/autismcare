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
   $myChats2 = mysqli_query($connect_users, "SELECT * FROM `chat__create` WHERE `main_number2` = '$main_number'");

   
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
                                    <div class="messager__chat-mes <?php if ($message['main_number'] == $main_number){?>messager__chat-mes-me<?php } else{?>messager__chat-mes-user<?php }?>">
                                        <p><?php echo $message['message'];?></>
                                    </div>
                                </div>
                                <?php }?>
                          

                            </div>
                            <div class="messager__control">
                                <div class="messager__control-content">
                                    <input type="hidden" class="messId" value="<?php echo $messId;?>">
                                    <textarea class="messager__control-textarea" name="<?php echo $chatId;?>" id="" ></textarea>
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
    <script src="JS/system.js"></script>
    <script src="JS/chat.js"></script>
    <script>
        const messId = document.querySelector('.messId').value;
        		function show()
		{
			$.ajax({
				url: `messager.php?mess=${messId}`,
				cache: false,
				success: function(html){
					$(".messager__chat").html(html);
				}
			});
            const block = document.querySelector('.messager__chat');
            if ((block.scrollHeight > block.scrollTop + block.offsetHeight) && (block.scrollHeight < block.scrollTop + block.offsetHeight + 40)){
                block.scrollTop = block.scrollHeight;
                console.log(block.scrollHeight);
            }
  
		}
	
		$(document).ready(function(){
			show();
			setInterval('show()',400);
            
           
            
		});
	</script>                               
</body>

</html>