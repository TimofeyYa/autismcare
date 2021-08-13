<?php
   session_start();
   require_once 'connect.php';

   $ancID = $_POST['ancID'];
   mysqli_query($connect_users, "UPDATE `ancets__data` SET `status` = '2' WHERE `ancets__data`.`id` = ' $ancID'");