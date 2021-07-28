<?php
   session_start();
   require_once 'connect.php';

   $title = $_POST['questTitle'];
   $desc = $_POST['questDesc'];
   $main_number =  $_SESSION['user']['main_number'];

   $check_quest = mysqli_query($connect_users, "SELECT * FROM `user__quest-spec` WHERE `main_number` = '$main_number'");
   if ($_POST['questType'] == 1){
    if (mysqli_num_rows($check_quest) > 0){
        mysqli_query($connect_users, "UPDATE `user__quest-spec` SET `title` = '$title', `comment` = '$desc' WHERE `user__quest-spec`.`main_number` = '$main_number'");
    } else {
        mysqli_query($connect_users, "INSERT INTO `user__quest-spec` (`id`, `main_number`, `title`, `comment`, `type`) VALUES (NULL, '$main_number', '$title', '$desc', '1')");
    }
   } else if ($_POST['questType'] == 2){
    if (mysqli_num_rows($check_quest) > 0){
        echo "hello world";
        mysqli_query($connect_users, "UPDATE `user__quest-spec` SET `title` = '$title', `comment` = '$desc' WHERE `user__quest-spec`.`main_number` = '$main_number'");
        mysqli_query($connect_users, "DELETE FROM `user__quest-kid` WHERE `user__quest-kid`.`main_number` = '$main_number'");
        mysqli_query($connect_users, "INSERT INTO `user__quest-kid` (`id`, `main_number`, `kid1`, `kid2`, `kid3`, `kid4`, `kid5`, `kid6`, `kid7`) VALUES (NULL, '$main_number', NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

        $j = 1;
        for ($i = 1; $i<=7; $i++){
            
            if (!empty($_POST['kid-'.$i])){
                $updateItem = 'kid'.$j;
                $itemUp = $_POST['kid-'.$i];
                mysqli_query($connect_users, "UPDATE `user__quest-kid` SET `$updateItem` = '$itemUp' WHERE `user__quest-kid`.`main_number` = '$main_number'");
                $j=$j +1;
                echo $updateItem.' '.$itemUp;
            }
        }
    } else {
        echo "Попка";
        mysqli_query($connect_users, "INSERT INTO `user__quest-spec` (`id`, `main_number`, `title`, `comment`, `type`) VALUES (NULL, '$main_number', '$title', '$desc', '2')");
        mysqli_query($connect_users, "INSERT INTO `user__quest-kid` (`id`, `main_number`, `kid1`, `kid2`, `kid3`, `kid4`, `kid5`, `kid6`, `kid7`) VALUES (NULL, '$main_number', NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

        
        $j = 1;
        for ($i = 1; $i<=7; $i++){
            
            if (!empty($_POST['kid-'.$i])){
                $updateItem = 'kid'.$j;
                $itemUp = $_POST['kid-'.$i];
                mysqli_query($connect_users, "UPDATE `user__quest-kid` SET `$updateItem` = '$itemUp' WHERE `user__quest-kid`.`main_number` = '$main_number'");
                $j=$j +1;
                echo $updateItem.' '.$itemUp;
            }
        }
    
    }
   }

   