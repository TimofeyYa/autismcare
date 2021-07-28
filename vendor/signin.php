<?php
   session_start();
   require_once 'connect.php';

   $login = $_POST['login'];
   $password = $_POST['password'];

   $check_user = mysqli_query($connect_users, "SELECT * FROM `accaunts` WHERE `login` = '$login' AND `password` = '$password'");
   if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc( $check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['name'],
            "email" => $user['email'],
            "type" => $user['type'],
            "main_number" => $user['main_number']
        ];
        // print_r($_SESSION['user']);
        // echo $_SESSION['user']['type'];
        header('location: ../profil.php');
   }else{
    $_SESSION['message'] = 'Такой пользователь не заригистрирован';
    
   }