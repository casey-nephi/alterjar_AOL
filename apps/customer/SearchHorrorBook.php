<?php
	include 'DAO/LibraryDao.php';

	$name = $_POST['Name'];
	$Type="horror";
	
	if($name!=""){
		$action = new LibraryDao();
		$action -> searchbook($Type,$name);
	}else{
		$action = new LibraryDAO();
        $action->view($Type);
	}


?>