<?php
	include 'DAO/LibraryDao.php';

	$name = $_POST['Name'];
	$Type="love";
	
	if($name!=""){
		$action = new LibraryDao();
		$action -> searchbook($Type,$name);
	}else{
		$action = new LibraryDAO();
        $action->view($Type);
	}


?>