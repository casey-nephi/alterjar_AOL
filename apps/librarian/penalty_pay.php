<?php
   include 'dao/LibraryDAO.php';
   
  
	$Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Brgy=$_POST["Brgy"];
	$Num=$_POST["Num"];
	$Date=$_POST['date'];

	$action = new LibraryDAO();
	 
   
  
	$action->penalty_pay($Date,$Fname,$Lname,$Brgy,$Num);
	
   
?>