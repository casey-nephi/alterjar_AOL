<?php
    include 'dao/BaseDAO.php';
    
    class UserDAO extends BaseDAO{
        
        
		         
            function logIn($Username,$Password){
      	
                  $this->openConn();
                  		
                  $stmt = $this->dbh->prepare("SELECT * FROM Librarian WHERE username=? AND password =?");
		              $stmt->bindParam(1,$Username);
		              $stmt->bindParam(2,$Password);
                  $stmt->execute();
                  
		               		
                	if($row = $stmt->fetch()){
                    
                    return true;

                  }else{

  			           return false;
  			          
                  }
                  										
                  $this->closeConn();
                  
            }
            
            function getUser($Username,$Password){
      	
                  $this->openConn();
                  		
                  $stmt = $this->dbh->prepare("SELECT username FROM Librarian WHERE username=? AND password =?");
		              $stmt->bindParam(1,$Username);
		              $stmt->bindParam(2,$Password);
                  $stmt->execute();
                  
		               		
              	  $row = $stmt->fetch();
                  
                   return $row[0];
                  										
                  $this->closeConn();
                  
            }

            function get_librarian($id){

                  $this->openConn();
                        
                  $stmt = $this->dbh->prepare("SELECT username,password FROM Librarian where id=?");
                  $stmt->bindParam(1,$id);
                  $stmt->execute();
                        
                  $record = $stmt->fetch();

                  $list = array("test_user"=>$record[0], "test_pass"=>$record[1]);

                  $json_string = json_encode($list);      

                  echo $json_string;
                      
                  $this->closeConn();

            }

            function change($User2,$Pass2,$hint){

                  $this->openConn();
                      
                  $stmt = $this->dbh->prepare("UPDATE Librarian SET username=?, password=?, Hint=? WHERE id=1 ");
                  $stmt->bindParam(1,$User2);
                  $stmt->bindParam(2,$Pass2);
                  $stmt->bindParam(3,$hint);
                  $stmt->execute();
                
                  $this->closeConn();

               }
  
               function add_book($Stock,$Title,$Rent,$Type){
  
                  $this->openConn();
  
                  $stmt = $this->dbh->prepare("INSERT INTO Books (Type,Title,Rent_price,Stock) values (?,?,?,?)");
                  $stmt->bindParam(1, $Type);
                  $stmt->bindParam(4, $Stock);
                  $stmt->bindParam(2, $Title);
                  $stmt->bindParam(3, $Rent);
                  $stmt->execute();
                  
                  $this->closeConn();                                                                                                                             

                }

                function hint(){


                  $this->openConn();
                        
                  $stmt = $this->dbh->prepare("SELECT Hint FROM Librarian where id=1");
                  
                  $stmt->execute();
                        
                  $record = $stmt->fetch();

                  $list = array("question_hint"=>$record[0]);

                  $json_string = json_encode($list);      

                  echo $json_string;
                      
                  $this->closeConn();

                }

                function Delete($id){
                
                  $this->openConn();
                  
                  $stmt = $this->dbh->prepare("DELETE FROM Books WHERE id=?");
                  $stmt->bindParam(1, $id);
                  $stmt->execute();
                        
                  $this->closeConn();
                  
                }

                function delete_customer($Fname,$Lname,$Brgy,$Num){

                  $this->openConn();
                
                  $stmt = $this->dbh->prepare("DELETE  FROM Orders WHERE Firstname=? and Lastname=? and Brgy=? and Number=?");
                  $stmt->bindParam(1, $Fname);
                  $stmt->bindParam(2, $Lname);
                  $stmt->bindParam(3, $Brgy);
                  $stmt->bindParam(4, $Num);
                  $stmt->execute();
                       
                  $this->closeConn();
              
                }
              
              
      }
      
?>
