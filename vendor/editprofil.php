<?php
   session_start();
   require_once 'connect.php';

   print_r($_POST);
   print_r($_FILES);

   $counEdu = [];
   $j = 1;
   for ($i = 1; $i < count($_POST); $i=$i+1){
      if (!empty($_POST['edu-'.$i])){
      $counEdu[$j] = $_POST['edu-'.$i];
      $j = $j + 1;
   }
   };
   
   

   $aboutUser = $_POST['aboutme'];
   $main_number =  $_SESSION['user']['main_number'];
   mysqli_query($connect_users, "DELETE FROM `accaunts-edu` WHERE `accaunts-edu`.`main_number` = '$main_number';");
   for ($i = 1; $i <= count($counEdu); $i=$i+1){

      mysqli_query($connect_users,"INSERT INTO `accaunts-edu` (`id`, `numEdu`, `main_number`, `content`) VALUES (NULL, '$i', '$main_number', '$counEdu[$i]')");
      
      
   };

   if (!empty($_FILES['avatar']['name'])){
      $avatarName = $main_number.time().$_FILES['avatar']['name'];
   $path = '../uploads/'.$avatarName;
   move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
   mysqli_query($connect_users, "UPDATE `accaunts-info` SET `about` = '$aboutUser', `avatar` = '$avatarName' WHERE `main_number` = '$main_number'");

   } else {
      mysqli_query($connect_users, "UPDATE `accaunts-info` SET `about` = '$aboutUser' WHERE `accaunts-info`.`id` = 1");
   }
   
   

  