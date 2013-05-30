<?php
   include 'dao/LibraryDAO.php';
   
  
	$Deliver="NO";

	$action = new LibraryDAO();
	 
   
  
	$action->view_orders($Deliver);
	
   
?>