
  <?php
   include 'dao/LibraryDAO.php';
   
  
	$Type="horror";

	$action = new LibraryDAO();
	 
   
  
	$action->viewBooks($Type);
	
   
?>
