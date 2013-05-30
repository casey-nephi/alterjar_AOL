<?php
	
	 include 'DAO/LibraryDao.php';
   
    
      $id= $_POST['id'];
      
      $action = new LibraryDao();
      
      $action->orderbook($id);


?>