<?php
       session_start();
       require_once 'connect.php';

       $main_number =  $_SESSION['user']['main_number'];
       $status = $_POST['status'];
       echo $status;
       mysqli_query($connect_users, "UPDATE `user__quest-spec` SET `visually` = '$status' WHERE `user__quest-spec`.`main_number` = '$main_number'");