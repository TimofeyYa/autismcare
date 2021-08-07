<?php
       session_start();
       require_once 'connect.php';

       $id =$_POST['id'];

       mysqli_query($connect_users,"UPDATE `service__db` SET `status` = 'ok' WHERE `service__db`.`id` = '$id'");