<?php
       session_start();
       require_once 'connect.php';

       $message = $_POST['message'];
       $chatid = $_POST['chatid'];
       $main_number =  $_SESSION['user']['main_number'];
       $messid = $_POST['messid'];
       $ancetInfo = $_POST['ancetInfo'];
       $serviceInfo = $_POST['serviceInfo'];
       if(empty($ancetInfo)){
              echo 'Monomyr';
              $ancetInfo = '0';
       }
       if(empty($serviceInfo)){
              echo 'Monojar';
              $serviceInfo = '0';
       }

       mysqli_query($connect_users, "INSERT INTO `chat__message` (`id`, `main_number`, `chat_number`, `message`, `ancets`, `service_id`) VALUES (NULL, '$main_number', '$chatid', '$message', '$ancetInfo', '$serviceInfo')");

      