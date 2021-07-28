<?php 
    $DBname = 'mysql';
    $DBpassword = 'mysql';
    $DBhost ='localhost';


    $connect_mess = mysqli_connect($DBhost, $DBname,$DBpassword,'savelp');
    mysqli_query( $connect_mess,"SET NAMES 'utf8'");  // База данных формы отправки

    $connect_users = mysqli_connect($DBhost, $DBname,$DBpassword,'ac__users');
    mysqli_query($connect_users,"SET NAMES 'utf8'"); // База данных пользователей

    if(!$connect_mess){
        die('error connect to message DataBase');
    }
    if(!$connect_users){
        die('error connect to users DataBase');
    }