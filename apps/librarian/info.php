<?php
   include 'dao/LibraryDAO.php';
   
  
	$Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Brgy=$_POST["Brgy"];
	$Num=$_POST["Num"];

	$action = new LibraryDAO();
	 
   
  
	$action->info($Fname,$Lname,$Brgy,$Num);
	
   
?>