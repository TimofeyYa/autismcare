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

   $myChats = mysqli_query($connect_users, "SELECT * FROM `chat__create` WHERE `main_number1` = '$main_number' OR `main_number2` = '$main_number'");
  

   
?>



        <?php while ($message = mysqli_fetch_array($check_chatMess)){?>
        <div class="messager__chat-block">
            <div
                class="messager__chat-mes <?php if ($message['main_number'] == $main_number){?>messager__chat-mes-me<?php } else{?>messager__chat-mes-user<?php }?>">
                <p><?php echo $message['message'];?></p>
            </div>
        </div>
        <?php }?>


