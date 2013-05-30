
  <?php
   include 'dao/LibraryDAO.php';
   
  
	$Type="love";

	$action = new LibraryDAO();
	 
   
  
	$action->viewBooks($Type);
	
   
?>


