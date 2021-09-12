<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: index.php');
    }
    
    require_once 'vendor/connect.php';

    $timeId = $_GET['roomID'];
?>
<div class="timer">
    <?php echo 'hello world';?>
</div>