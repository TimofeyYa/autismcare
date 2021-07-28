<?php
       session_start();
       require_once 'connect.php';

       $name = $_POST['name'];
       $old = $_POST['old'];
       $about = $_POST['about'];
       $File;

       $main_number =  $_SESSION['user']['main_number'];

       if (isset($_FILES['Doc'])){
              $FileName = $main_number.time().$_FILES['Doc']['name'];
              $path = '../uploudFile/'.$FileName;
              echo $_FILES['Doc']['name'];
              move_uploaded_file($_FILES['Doc']['tmp_name'], $path);
          
            
              
              $File = $FileName;
          };

       mysqli_query($connect_users, "INSERT INTO `accaunts-kids` (`id`, `main_number`, `name`, `old`, `about`, `document`) VALUES (NULL, '$main_number', '$name', '$old', '$about', '$File')");