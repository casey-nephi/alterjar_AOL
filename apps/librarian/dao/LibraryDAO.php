  <?php
    include 'dao/BaseDAO.php';
    
    class LibraryDAO extends BaseDAO{
        
        
    	            function view_orders($Deliver){
			        
			            $this->openConn();
          
                        $stmt = $this->dbh->prepare(" SELECT DISTINCT Firstname,Lastname,Brgy,Number FROM Orders WHERE Deliver=? and Status='Not Paid'");
                        $stmt->bindParam(1, $Deliver);
		   
		                $stmt->execute();
		     

		                while($row = $stmt->fetch()){
				                 echo "<tr>";
				                 echo "<td>".$row[0]."</td>";
				                 echo "<td>".$row[1]."</td>";
				              
							              if ($Deliver == "YES" ) {
							              
							              	echo "<td><button class='rent' onclick='rentsd(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";

							              }else{
							              
							                echo "<td><button class='rent' onclick='rentsp(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";
						                  
						                  }
							    
							    echo "<td><button class='btn btn-info' id='info' onclick='info(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >INFO</button></td>";
				                echo "<td><button class='btn btn-success' id='paid' onclick='paid(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >PAID</button></td>";
				                echo "</tr>"; 
		                  
		                }
		     
		                $this->closeConn();
		       
	                }
	               
	                function view_borrowers($Date){
			        
			            $this->openConn();

			            $stmt = $this->dbh->prepare(" SELECT DISTINCT Firstname,Lastname,Brgy,Number FROM Orders WHERE DueDate > ? and Status='Borrowed'");
                        $stmt->bindParam(1, $Date);
			              
		                $stmt->execute();
			              

			              while($row = $stmt->fetch()){
				          
				              echo "<tr>";
				              echo "<td>".$row[0]."</td>";
				              echo "<td>".$row[1]."</td>";
				              echo "<td><button class='rent' onclick='rentsd(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";
				              echo "<td><button  class='btn btn-info' id='info' id='info' onclick='info(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >INFO</button></td>";
				              echo "<td><button class='btn btn-success' id='return' onclick='returned(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >RETURNED</button></td>";
				              echo "</tr>"; 
		                  }
		                  
		                $this->closeConn();
		       
	                }
	                
	                function view_penalties($Date){
			        
			            $this->openConn();

			            $stmt = $this->dbh->prepare(" SELECT DISTINCT Firstname,Lastname,Brgy,Number FROM Orders WHERE DueDate < ? and Status='Borrowed'");
    		            $stmt->bindParam(1, $Date);
	     
	                    $stmt->execute();
			              

			              while($row = $stmt->fetch()){
				       
				              echo "<tr>";
				              echo "<td>".$row[0]."</td>";
				              echo "<td>".$row[1]."</td>";
			                  echo "<td><button class='rent' onclick='rentsd(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";
				              echo "<td><button  class='btn btn-info' id='info' id='info' onclick='info(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >INFO</button></td>";
				              echo "<td><button class='btn btn-success' id='p_return' onclick='pay_returned(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >RETURNED</button></td>";
				              echo "</tr>"; 
		               
		                  }
		               
		                  $this->closeConn();
		       
	                }

	                function view_returns(){
			       
			            $this->openConn();

			            $stmt = $this->dbh->prepare(" SELECT DISTINCT Firstname,Lastname,Brgy,Number FROM Orders WHERE Status='RETURNED'");
		              
                        $stmt->execute();
		              

			              while($row = $stmt->fetch()){
				     
				              echo "<tr>";
				              echo "<td>".$row[0]."</td>";
		     	              echo "<td>".$row[1]."</td>";
			                  echo "<td><button class='rent' onclick='rentsp(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";
				              echo "<td><button  class='btn btn-info' id='info' id='info' onclick='info(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >INFO</button></td>";
				              echo "<td><img class='DELETE' src='images/Delete-icon.png' onclick='Delete_Customer(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")'></td>";
				              echo "</tr>"; 
		             
		                  }
		             
		                  $this->closeConn();
		       
	                }
	                
                    function view($Type){


                          
               
		               $this->openConn();
					   
					   $stmt = $this->dbh->prepare("SELECT * FROM".$Type."");
					   
					   $stmt->execute();

                 	   $this->closeConn();

							while($row = $stmt->fetch()){
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td><img class='DELETE' src='images/Delete-icon.png' onclick='DELETE(".$row[0].")'></td>";
								echo "</tr>"; 
							}
				                     


                    }
    	             //--------------------------------------------------------------------------------------------------------------
	                function viewBooks($Type){
         
					    $this->openConn();
						
						$stmt = $this->dbh->prepare("SELECT Books.id,Title,Books.Rent_price,Stock,Stock-sum(Num_book_rent) from Books left join Orders on Books.id=Orders.Book_id and Status!='RETURNED' where Type=?  group by Books.id");
						$stmt->bindParam(1,$Type);
						
						$stmt->execute();

						$this->closeConn();

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
											
								echo "<td><img class='rent' src='images/Delete-icon.png' onclick='DELETE(".$row[0].")'</td>";
					         	echo "</tr>"; 
							
							}

					}
				    
				    function show_rents($Fname,$Lname,$Brgy,$Num,$stat_book){

				        $this->openConn();
					
						$stmt = $this->dbh->prepare("SELECT Num_book_rent,Title,b.Rent_price FROM Books as b,Orders as o WHERE b.id=o.Book_id and Firstname=? and Lastname=? and Brgy=? and Number=? and Status=? ");
						$stmt->bindParam(1, $Fname);
						$stmt->bindParam(2, $Lname);
						$stmt->bindParam(3, $Brgy);
						$stmt->bindParam(4, $Num);
						$stmt->bindParam(5, $stat_book);
					
						$stmt->execute();

						$this->closeConn();

							while($row = $stmt->fetch()){
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
							    echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
				               	echo "</tr>"; 
							}

				    }
				    
				    function info($Fname,$Lname,$Brgy,$Num){

				        $this->openConn();
					    
					    $stmt = $this->dbh->prepare("SELECT DATE,DueDate,Brgy,Number,sum(Rent_price * Num_book_rent) FROM Orders WHERE Firstname=? and Lastname=? and Brgy=? and Number=?");
						$stmt->bindParam(1, $Fname);
						$stmt->bindParam(2, $Lname);
						$stmt->bindParam(3, $Brgy);
						$stmt->bindParam(4, $Num);
						
						$stmt->execute();

						$record = $stmt->fetch();
				            
				        $list = array("H_d"=>$record[0],"H_dd"=>$record[1],"H_a"=>$record[2], "H_n"=>$record[3],"H_p"=>$record[4]);
				         
						$json_string = json_encode($list);			
						
						echo $json_string;

						$this->closeConn();
				              
				                
				    }
				    
				    function penalty_pay($Date,$Fname,$Lname,$Brgy,$Num){

				        $this->openConn();
					
						$stmt = $this->dbh->prepare("SELECT sum(DATEDIFF(?,DueDate)*20) FROM Orders WHERE Firstname=? and Lastname=? and Brgy=? and Number=?");
					    $stmt->bindParam(1, $Date);
						$stmt->bindParam(2, $Fname);
						$stmt->bindParam(3, $Lname);
						$stmt->bindParam(4, $Brgy);
						$stmt->bindParam(5, $Num);
						
						$stmt->execute();

						$record = $stmt->fetch();
				            
				        $list = array("penalty_pay"=>$record[0]);
				         
						$json_string = json_encode($list);			
						
						echo $json_string;

						$this->closeConn();
				             
				                
				    }
				    
				    function pay($Fname,$Lname,$Brgy,$Num,$date,$duedate){

				        $this->openConn();
					
					    $stmt = $this->dbh->prepare("UPDATE Orders SET Status='Borrowed', DATE=? , DueDate=? WHERE Firstname=? and Lastname=? and Brgy=? and Number=?");
						$stmt->bindParam(1, $date);
						$stmt->bindParam(2, $duedate);
						$stmt->bindParam(3, $Fname);
						$stmt->bindParam(4, $Lname);
						$stmt->bindParam(5, $Brgy);
						$stmt->bindParam(6, $Num);
						$stmt->execute();

						$this->closeConn();


				    }

				    function returned($Fname,$Lname,$Brgy,$Num){

				        $this->openConn();
					    
					    $stmt = $this->dbh->prepare("UPDATE Orders SET Status='RETURNED' WHERE Firstname=? and Lastname=? and Brgy=? and Number=?");
						$stmt->bindParam(1, $Fname);
						$stmt->bindParam(2, $Lname);
						$stmt->bindParam(3, $Brgy);
						$stmt->bindParam(4, $Num);
						
						$stmt->execute();

						$this->closeConn();


				    }

				    function searchname($name){
          
		                $this->openConn();

		                $stmt= $this->dbh->prepare(" SELECT DISTINCT Firstname,Lastname,Brgy,Number FROM Orders WHERE Status='RETURNED' and Firstname like '".$name."%'");
		                
		                $stmt->bindParam(1,$Date);
		                
		                $stmt->execute();
		                
		                $this->closeConn();
		            
		                $found = false;
		              
		                     while($row = $stmt->fetch()){
				              echo "<tr>";
				              echo "<td>".$row[0]."</td>";
		     	              echo "<td>".$row[1]."</td>";
			                  echo "<td><button class='rent' onclick='rentsp(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >SHOW ORDERS</button></td>";
				              echo "<td><button  class='btn btn-info' id='info' id='info' onclick='info(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")' >INFO</button></td>";
				              echo "<td><img class='DELETE' src='images/Delete-icon.png' onclick='Delete_Customer(\"".$row[0]."\",\"".$row[1]."\",\"".$row[2]."\",".$row[3].")'></td>";
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
	      
            
  
