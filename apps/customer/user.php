<?php

session_start();

include 'DAO/UserDao.php';

$Username=$_SESSION['Username'];


$action = new UserDAO();

$action->user($Username);


?>