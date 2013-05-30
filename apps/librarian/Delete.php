<?php
   include 'dao/UserDAO.php';
   
  
	$id=$_POST["id"];

	$action = new UserDAO();
	 
   
  
	$action->Delete($id);
	
   
?>