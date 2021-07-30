<?php
       session_start();
       require_once 'connect.php';

       $message = $_POST['message'];
       $chatid = $_POST['chatid'];
       $main_number =  $_SESSION['user']['main_number'];
       $messid = $_POST['messid'];

       mysqli_query($connect_users, "INSERT INTO `chat__message` (`id`, `main_number`, `chat_number`, `message`) VALUES (NULL, '$main_number', '$chatid', '$message')");

       $checChat = mysqli_query($connect_users, "SELECT * FROM `chat__create` WHERE `chat_number` = '$chatid'");

       echo mysqli_num_rows($checChat);
       if (mysqli_num_rows($checChat) == 0){
        mysqli_query($connect_users,"INSERT INTO `chat__create` (`id`, `main_number1`, `main_number2`, `chat_number`) VALUES (NULL, '$main_number', '$messid', '$chatid')");

        }