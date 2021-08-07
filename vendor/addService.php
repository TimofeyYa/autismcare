<?php
   session_start();
   require_once 'connect.php';

   $serviceId = $_POST['serviceId'];
   $spec_number = $_POST['spec_number'];
   $passient_number = $_POST['passient_number'];
   $title = $_POST['title'];
   $cost = $_POST['cost'];
   $date = $_POST['date'];
   $comment = $_POST['comment'];
   $dateTime = $_POST['dateTime'];
   $duration = $_POST['duration'];
   $type = $_POST['type'];
   $days = [];
   $main_number =  $_SESSION['user']['main_number'];

   for ($i = 1; $i <=7; $i++){
      $days[$i] = $_POST['day'.$i];
   }
   print_r($days);
   for ($i = 1; $i <=7; $i++){
      if (!empty($_POST['kid-'.$i])){
         $kid =   $_POST['kid-'.$i];
      }
   }
   $days = json_encode($days);
   echo $kid;
   echo $serviceId;

   if ($type == 1){
      mysqli_query($connect_users,"INSERT INTO `service__db` (`id`, `patient_number`, `spec_number`, `service_number`, `title`, `price`, `data`, `dataTime`, `days`, `type`, `duration`, `kid-id`, `Comment`, `status`, `author`) VALUES
    (NULL, '$passient_number', '$spec_number', '$serviceId', '$title', '$cost', '$date', '$dateTime',NULL, '$type', '$duration', '$kid', '$comment', 'wait', '$main_number')");
    echo 'hello world 1';
    echo mysqli_errno($connect_users) . ": " . mysqli_error($connect_users) . "\n";
   }
   // mysqli_query($connect_users, "INSERT INTO `service__data` (`id`, `patient_number`, `spec_number`, `service_number`, `title`, `price`, `data`, `dataTime`, `days`, `type`, `duration`, `kid-id`, `Comment`, `status`) VALUES
   //   (NULL, '$passient_number', '', '', '', '', '','', '', '', '', '', '', '')");
   if ($type == 2){
      mysqli_query($connect_users,"INSERT INTO `service__db` (`id`, `patient_number`, `spec_number`, `service_number`, `title`, `price`, `data`, `dataTime`, `days`, `type`, `duration`, `kid-id`, `Comment`, `status`, `author`) VALUES
    (NULL, '$passient_number', '$spec_number', '$serviceId', '$title', '$cost', NULL, NULL,'$days', '$type', '$duration', '$kid', '$comment', 'wait', '$main_number')");
    echo 'hello world 2';
   }
   