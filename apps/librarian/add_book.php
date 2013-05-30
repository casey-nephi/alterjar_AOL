<?php
   include 'dao/UserDAO.php';
   
  
	$Title=$_POST["Title"];
	$Rent=$_POST["Rent"];
	$Stock=$_POST["Stock"];
    $Type=$_POST["Type"];



	$action = new UserDAO();
	 
   
  
	$action->add_book($Stock,$Title,$Rent,$Type);
	
   
?>