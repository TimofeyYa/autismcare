<?php
   session_start();
   require_once 'connect.php';

   $titlePort = $_POST['portTitle'];
   $descPort = $_POST['portDesc'];
   $main_number =  $_SESSION['user']['main_number'];
   $j=1;
   $imgArr = array();
   $imgArr['img-1'] = '';
   $imgArr['img-2'] = '';
   $imgArr['img-3'] = '';

   forEach($_FILES as $img){
      $avatarName = $main_number.time().$img['name'];
      $path = '../uploads/'.$avatarName;
      echo $img['name'];
      move_uploaded_file($img['tmp_name'], $path);

      $imgArr['img-'.$j] = $avatarName;
      $j = $j + 1;
   }

   $img1 = $imgArr['img-1'];
   $img2 = $imgArr['img-2'];
   $img3 = $imgArr['img-3'];

   mysqli_query($connect_users, "INSERT INTO `accaunts-port` (`id`, `main_number`, `title`, `descr`, `img-1`, `img-2`, `img-3`) VALUES (NULL, '$main_number', '$titlePort', '$descPort', '$img1', '$img2', '$img3')");


   print_r($imgArr);