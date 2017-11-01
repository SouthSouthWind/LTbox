<?php 
    require './common/common.php';
    
 if(!$_SESSION['id']){
        //PHP的跳转
        header('Location:./notlogin.php');
        exit;
    }