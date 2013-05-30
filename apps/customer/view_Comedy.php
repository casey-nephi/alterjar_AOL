<?php
  
  include 'DAO/LibraryDao.php';

     $Type="comedy";

	$action = new LibraryDAO();

	$action->view($Type);

?>
