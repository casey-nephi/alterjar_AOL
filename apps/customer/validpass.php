<?php
include 'DAO/UserDao.php';

$leng = $_POST['leng'];

if($leng != 0){

    $action = new UserDAO();
    $action -> validpass($leng);

}

?>