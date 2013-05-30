<?php
   include 'dao/LibraryDAO.php';
   
  
	$Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Brgy=$_POST["Brgy"];
	$Num=$_POST["Num"];
	$stat_book=$_POST["book_stat"];

	$action = new LibraryDAO();
	 
   
  
	$action->show_rents($Fname,$Lname,$Brgy,$Num,$stat_book);
	
   
?>