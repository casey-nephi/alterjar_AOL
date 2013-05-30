<?php
      

    session_start();
	include 'DAO/UserDao.php';
    $action = new UserDAO();



               if($_POST['Username1'] !="" || $_POST['Password1']!="" || $_POST['firstname']!="" || $_POST['lastname']!="" || $_POST['address']!="" || $_POST['number'] !="" ){

                   if($_POST['Username1'] !="" && $_POST['Password1']!="" && $_POST['firstname']!="" && $_POST['lastname']!="" && $_POST['address']!="" && $_POST['number'] !="" ){


                       if($_POST['Username2'] >= 5 && $_POST['Password3'] >= 5 ){

                           if($_POST['Password2'] == $_POST['Password1']){

                               $name=$_POST['Username1'];

                                       if($action ->validname($name)){


                                           $Username=$_POST['Username1'];
                                           $Password=$_POST['Password1'];
                                           $Firstname=$_POST['firstname'];
                                           $Lastname=$_POST['lastname'];
                                           $Address=$_POST['address'];
                                           $Number=$_POST['number'];


                                           $action ->register($Username,$Password,$Firstname,$Lastname,$Address,$Number);

                                            $_SESSION['Username']=$Username;
                                            header('location: index.php');

                                       }else{


                                        header('location: log_in.php');



                                       }
                           }else{

                               header('location: log_in.php');

                           }
                    }else{

                               header('location: log_in.php');

                    }
                       
                   }else{
                       header('location: log_in.php');
                   }

               }else{

                   header('location: log_in.php');

               }


               
    
               
?>