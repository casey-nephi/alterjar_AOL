
  <?php
   include 'dao/LibraryDAO.php';
   
  
	$Type="comedy";

	$action = new LibraryDAO();
	 
   
  
	$action->viewBooks($Type);
	
   
?>
