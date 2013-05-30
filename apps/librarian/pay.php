<?php
   include 'dao/LibraryDAO.php';
   
  
	$Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Brgy=$_POST["Brgy"];
	$Num=$_POST["Num"];
	$date=$_POST["date"];
	$duedate=$_POST["dueDate"];

	$action = new LibraryDAO();
	 
   
  
	$action->pay($Fname,$Lname,$Brgy,$Num,$date,$duedate);
	
   
?>