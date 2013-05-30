<?php

    class BaseDAO {
    
        protected $user="root";
        protected $pass="";
        protected $dbname="casey_library";
        protected $dbh=null;
        
        
         function openConn(){
           
            $this->dbh=new PDO("mysql:host=localhost;dbname=".$this->dbname,$this->user,$this->pass);
       
         }
         
         function closeconn(){
         
            $this->dbh=null;
         
         }
    
    
        
    
    
    
    
    }


 

?>
