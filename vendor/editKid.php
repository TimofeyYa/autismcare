<?php
       session_start();
       require_once 'connect.php';

       $name = $_POST['name'];
       $old = $_POST['old'];
       $about = $_POST['about'];
       $id = $_POST['id'];
       $File;

       $main_number =  $_SESSION['user']['main_number'];

       if (isset($_FILES['Doc'])){
              $FileName = $main_number.time().$_FILES['Doc']['name'];
              $path = '../uploudFile/'.$FileName;
              echo $_FILES['Doc']['name'];
              move_uploaded_file($_FILES['Doc']['tmp_name'], $path);
          
            
              
              $File = $FileName;
              mysqli_query($connect_users, "UPDATE `accaunts-kids` SET `document` = '$File' WHERE `accaunts-kids`.`id` = '$id'");
          };

       mysqli_query($connect_users, "UPDATE `accaunts-kids` SET `name` = '$name', `old` = '$old', `about` = '$about' WHERE `accaunts-kids`.`id` = '$id'");