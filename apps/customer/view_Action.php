<?php
  
  include 'DAO/LibraryDao.php';

    $Type="action";

	$action = new LibraryDAO();

	$action->view($Type);

?>
