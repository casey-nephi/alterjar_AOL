<?php
   include 'dao/LibraryDAO.php';
   
  
	$Deliver="YES";

	$action = new LibraryDAO();
	 
   
  
	$action->view_orders($Deliver);
	
   
?>