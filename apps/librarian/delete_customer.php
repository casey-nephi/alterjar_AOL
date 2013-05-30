<?php
   include 'dao/UserDAO.php';
   
  
	$Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Brgy=$_POST["Brgy"];
	$Num=$_POST["Num"];

	$action = new UserDAO();
	 
   
  
	$action->delete_customer($Fname,$Lname,$Brgy,$Num);
	
   
?>