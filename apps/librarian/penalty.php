<?php
   include 'dao/LibraryDAO.php';
   
  
	$Date=$_POST['date'];

	$action = new LibraryDAO();
	 
   
  
	$action->view_penalties($Date);
	
   
?>