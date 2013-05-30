<?php
include 'DAO/UserDao.php';

$name = $_POST['Name'];
$leng = $_POST['leng'];

    if($name!=""){
        $action = new UserDAO();
        $action -> searchname($name,$leng);
    }

?>