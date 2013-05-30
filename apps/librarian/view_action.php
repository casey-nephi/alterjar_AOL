
  <?php
   include 'dao/LibraryDAO.php';
   
  
	$Type="action";

	$action = new LibraryDAO();
	 
   
  
	$action->viewBooks($Type);
	
   
?>
