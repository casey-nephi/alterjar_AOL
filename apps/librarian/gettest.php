<?php
	  

	 include 'dao/UserDAO.php';
    
      $id=$_POST['id'];
      //$Pass1=$_POST['Pass1'];

      $action = new UserDAO();
      
      $action->get_librarian($id);


?>