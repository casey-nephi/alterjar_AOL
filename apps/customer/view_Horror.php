<?php
  
  include 'DAO/LibraryDao.php';

     $Type="horror";

	$action = new LibraryDAO();

	$action->view($Type);

?>
