<?php
    
    include 'DAO/BaseDAO.php';
    
    class LibraryDAO extends BaseDAO {
    
        function view($Type){
         
                $this->openConn();

          		$stmt = $this->dbh->prepare("SELECT Books.id,Title,Books.Rent_price,Stock,Stock-sum(Num_book_rent) from Books left join Orders on Books.id=Orders.Book_id and Status!='RETURNED' where Type=? group by Books.id");
          		$stmt->bindParam(1,$Type);
          			
                $stmt->execute();



              			while($row = $stmt->fetch()){
              				echo "<tr>";
              				echo "<td><span class='badge badge-success'>".$row[0]."</span></td>";
              				echo "<td>".$row[1]."</td>";
              				echo "<td>".$row[2]."</td>";

                            if($row[4] == NULL){
                              echo "<td>".$row[3]."</td>";
                            }else{
                              echo "<td>".$row[4]."</td>";
                            }
				
              				echo "<td><img class='rent' src='images/tu.png' onclick='rentbook(".$row[0].")'</td>";
                            echo "<td><button class='btn btn-primary' onclick='preview(".$row[0].")'>PRE-VIEW</button></td>";
              				echo "</tr>"; 
			              }
                $this->closeConn();
        }
       
       //-----------------------------------------------------------------------------
      
        function orderbook($id){

             	  $this->openConn();
      		                    
      		      $stmt = $this->dbh->prepare("SELECT Books.id,Books.Rent_price,Stock,Stock-sum(Num_book_rent) from Books left join Orders on Books.id=Orders.Book_id where Books.id=? group by Books.id");
      		      $stmt->bindParam(1,$id);

      		      $stmt->execute();
		                    
      		      $record = $stmt->fetch();
                
                  if($record[3] == NULL){
                    $list = array("title"=>$record[0], "rent"=>$record[1], "stock"=>$record[2]);
                  }else{
                     $list = array("title"=>$record[0], "rent"=>$record[1], "stock"=>$record[3]);
                  }
        			 
        			  $json_string = json_encode($list);			
        			  
                echo $json_string;
        			
        	      $this->closeConn();
        }
       
       //----------------------------------------------------------------------------------
       
        function stock_change($id,$stock){

                $this->openConn();
                              
                $stmt = $this->dbh->prepare("UPDATE Books SET Stock=? WHERE id=?");
                $stmt->bindParam(1,$stock);
                $stmt->bindParam(2,$id);
                $stmt->execute();
       
                $this->closeConn();

        }
       
       //----------------------------------------------------------------------------------

        
       
       //----------------------------------------------------------------------------------
       
        function orderlist($title,$rent,$date,$dueDate,$No_book,$Fname,$Lname,$Deliver,$Address,$Number){

                $this->openConn();
                
                $stmt = $this->dbh->prepare("insert into Orders (DATE,DueDate,Num_book_rent,Deliver,Book_id,Rent_price,Firstname,Lastname,Brgy,Number) values (?,?,?,?,?,?,?,?,?,?)");

                $stmt->bindParam(1, $date);
                $stmt->bindParam(2, $dueDate);
                $stmt->bindParam(3, $No_book);
                $stmt->bindParam(4, $Deliver);
                $stmt->bindParam(5, $title);
                $stmt->bindParam(6, $rent);
                $stmt->bindParam(7, $Fname);
                $stmt->bindParam(8, $Lname);
                $stmt->bindParam(9, $Address);
                $stmt->bindParam(10, $Number);
                        
                $stmt->execute();
           
                $this->closeConn();

        }

       //-----------------------------------------------------------------------------------------

        function preview($id){

                $this->openConn();

                $stmt = $this->dbh->prepare("SELECT id,Title from Books  where id=?");
                $stmt->bindParam(1,$id);

                $stmt->execute();

                $this->closeConn();

                      while($row = $stmt->fetch()){
                        echo "<tr>";
                        echo "<td><img class='pre' id='prebook' src='Book_images/".$row[1].".jpeg' onclick='rentbook(".$row[0].")'></td>";
                        echo "</tr>"; 
                      }

        }
       //---------------------------------------------------------------------------------------------

         function searchbook($Type,$name){
          
                $this->openConn();

                $stmt= $this->dbh->prepare("SELECT Books.id,Title,Books.Rent_price,Stock,Stock-sum(Num_book_rent) from Books left join Orders on Books.id=Orders.Book_id and Status!='RETURNED' where Type=? and Title like '".$name."%' group by Books.id");
                $stmt->bindParam(1,$Type);
                
                $stmt->execute();
                
                $this->closeConn();
            
                $found = false;
              
                      while($row = $stmt->fetch()){
                        echo "<tr>";
                        echo "<td><span class='badge badge-success'>".$row[0]."</span></td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        
                          if($row[4] == NULL){
                            echo "<td>".$row[3]."</td>";
                          }else{
                            echo "<td>".$row[4]."</td>";
                          }
                      
                        echo "<td><img class='rent' src='images/tu.png' onclick='rentbook(".$row[0].")'</td>";
                        echo "<td><button class='btn btn-primary' onclick='preview(".$row[0].")'>PRE-VIEW</button></td>";
                        echo "</tr>"; 
                       
                        $found = true;
                    }
                      
                      if(!$found){
                          echo "<tr>";
                          echo "<td colspan='7'>NO DATA FOUND</td>";
                          echo "</tr>"; 
                      }
              
           
         }


}

?>
