<?php
   session_start();
   require_once 'connect.php';

   $titlePort = $_POST['portTitle'];
   $descPort = $_POST['portDesc'];
   $editPortId = $_POST['editPortId'];
   $main_number =  $_SESSION['user']['main_number'];
   $j=1;
   $imgArr = array();
   $imgArr['img-1'] = '';
   $imgArr['img-2'] = '';
   $imgArr['img-3'] = '';

   $image3 = $_FILES['image-3'];
   $image4 = $_FILES['image-4'];
   $image5 = $_FILES['image-5'];
   print_r($_FILES);

    $isDelite3 = $_POST['isDelite3'];
    $isDelite4 = $_POST['isDelite4'];
    $isDelite5 = $_POST['isDelite5'];

    if ($isDelite3 == 1){
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-1` = '' WHERE `accaunts-port`.`id` = '$editPortId'");
    }
    if ($isDelite4 == 1){
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-2` = '' WHERE `accaunts-port`.`id` = '$editPortId'");
    }
    if ($isDelite5 == 1){
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-3` = '' WHERE `accaunts-port`.`id` = '$editPortId'");
    }

    if (isset($_FILES['image-3'])){
        $avatarName = $main_number.time().$_FILES['image-3']['name'];
        $path = '../uploads/'.$avatarName;
        echo $_FILES['image-3']['name'];
        move_uploaded_file($_FILES['image-3']['tmp_name'], $path);
    
      
        
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-1` = '$avatarName' WHERE `accaunts-port`.`id` = '$editPortId'");
    }

    if (isset($_FILES['image-4'])){
        $avatarName = $main_number.time().$_FILES['image-4']['name'];
        $path = '../uploads/'.$avatarName;
        echo $_FILES['image-4']['name'];
        move_uploaded_file($_FILES['image-4']['tmp_name'], $path);
    
      
        
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-2` = '$avatarName' WHERE `accaunts-port`.`id` = '$editPortId'");
    }
    if (isset($_FILES['image-5'])){
        $avatarName = $main_number.time().$_FILES['image-5']['name'];
        $path = '../uploads/'.$avatarName;
        echo $_FILES['image-5']['name'];
        move_uploaded_file($_FILES['image-5']['tmp_name'], $path);
    
      
        
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-3` = '$avatarName' WHERE `accaunts-port`.`id` = '$editPortId'");
    }

    

    function editPic($img, $num){
        $avatarName = $main_number.time().$img['name'];
        $path = '../uploads/'.$avatarName;
        echo $img['name'];
        move_uploaded_file($img['tmp_name'], $path);
        echo $num;
        mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-1` = '123' WHERE `accaunts-port`.`id` = '$editPortId'");
    }

//    forEach($_FILES as $img){
//       $avatarName = $main_number.time().$img['name'];
//       $path = '../uploads/'.$avatarName;
//       echo $img['name'];
//       move_uploaded_file($img['tmp_name'], $path);

//       $imgArr['img-'.$j] = $avatarName;
//       $j = $j + 1;
//    }

//    $img1 = $imgArr['img-1'];
//    $img2 = $imgArr['img-2'];
//    $img3 = $imgArr['img-3'];


mysqli_query($connect_users, "UPDATE `accaunts-port` SET `title` = '$titlePort', `descr` = '$descPort' WHERE `accaunts-port`.`id` = '$editPortId'");

// if ($img1 != ''){
//     mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-1` = '$img1' WHERE `accaunts-port`.`id` = '$editPortId'");
// }
// if ($img2 != ''){
//     mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-2` = '$img2' WHERE `accaunts-port`.`id` = '$editPortId'");
// }
// if ($img3 != ''){
//     mysqli_query($connect_users, "UPDATE `accaunts-port`  SET `img-3` = '$img3' WHERE `accaunts-port`.`id` = '$editPortId'");
// }