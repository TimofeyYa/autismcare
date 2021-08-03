<?php
   session_start();
   require_once 'connect.php';

   $ancID = $_POST['ancID'];

   mysqli_query($connect_users, "DELETE FROM `ancets__data` WHERE `ancets__data`.`id` = '$ancID'");