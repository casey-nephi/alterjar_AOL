<?php
include 'DAO/UserDao.php';

$pass1 = $_POST['pass1'];
$leng1= $_POST['leng1'];
$pass2= $_POST['pass2'];
$leng2= $_POST['leng2'];

if($leng1 != 0 || $leng2 !=0){

    $action = new UserDAO();
    $action -> passmatch($pass1,$leng1,$pass2,$leng2);

}

?>