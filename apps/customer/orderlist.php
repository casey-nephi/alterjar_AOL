<?php
	
	 include 'DAO/LibraryDao.php';
   
    
      $title= $_POST['title'];

      $rent= $_POST['rent'];

      $date= $_POST['date'];

      $dueDate= $_POST['dueDate'];

      $No_book= $_POST['No_book'];

      $Fname= $_POST['Fname'];

      $Lname= $_POST['Lname'];

      $Deliver= $_POST['Deliver'];

      $Address= $_POST['address'];

      $Number= $_POST['Num'];


      $action = new LibraryDAO();
      
      $action->orderlist($title,$rent,$date,$dueDate,$No_book,$Fname,$Lname,$Deliver,$Address,$Number);


?>