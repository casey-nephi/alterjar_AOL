<?php
  
  include 'DAO/LibraryDao.php';

     $Type="love";

	$action = new LibraryDAO();

	$action->view($Type);

?>
