<?php
       session_start();

       require_once 'connect.php';

       $ancID = $_POST['ancID'];
       $recNum = $_POST['recNum'];
       $main_number =  $_SESSION['user']['main_number'];

       mysqli_query($connect_users,"INSERT INTO `ancets__data` (`id`, `ancet_id`, `sender_num`, `recipient_num`, `status`) VALUES (NULL, '$ancID', '$main_number', '$recNum', '1')");