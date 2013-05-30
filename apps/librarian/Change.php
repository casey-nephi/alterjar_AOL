<?php
      
       
	 include 'dao/UserDAO.php';
    
      $User2=$_POST['User2'];
      $Pass2=$_POST['Pass2'];
      $hint=$_POST['hint'];
      

      $action = new UserDAO();
      
      $action->change($User2,$Pass2,$hint);

               
    
               
?>