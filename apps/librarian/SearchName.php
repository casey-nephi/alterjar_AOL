<?php
	
	include 'dao/LibraryDAO.php';

	$name = $_POST['Name'];
	
	
	
	if($name!=""){
		
		$action = new LibraryDAO();
		
		$action -> searchname($name);
	
	}else{
		
		$action = new LibraryDAO();
        
        $action->view_returns();
	}


?>