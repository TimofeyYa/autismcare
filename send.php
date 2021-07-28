<?php 
    
    require_once 'connect.php';

    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $select = $_GET['select'];
    $comment = $_GET['comment'];



    mysqli_query($connect, "INSERT INTO `message` (`id`, `name`, `email`, `phone`, `item`, `comment`, `answer`) VALUES (NULL, '$name', '$email', '$phone', '$select', '$comment', 'Не обслуживался ')");
   
    header('location: index.php');