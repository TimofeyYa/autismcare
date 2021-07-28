<?php
   session_start();
   require_once 'connect.php';

   $id = $_POST['id_del'];
   mysqli_query($connect_users,"DELETE FROM `accaunts-port` WHERE `accaunts-port`.`id` = '$id'");