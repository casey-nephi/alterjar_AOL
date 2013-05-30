<?php
include 'DAO/BaseDAO.php';

class UserDAO extends BaseDAO
{


    function logIn($Username, $Password){

        $this->openConn();

        $stmt = $this->dbh->prepare("SELECT * FROM Customers WHERE Username=? AND Password =?");
        $stmt->bindParam(1, $Username);
        $stmt->bindParam(2, $Password);
        $stmt->execute();


        if ($row = $stmt->fetch()) {

            return true;

        } else {

            return false;

        }

        $this->closeConn();

    }

    function getUser($Username, $Password){

        $this->openConn();

        $stmt = $this->dbh->prepare("SELECT Username FROM Customers WHERE Username=? AND Password =?");
        $stmt->bindParam(1, $Username);
        $stmt->bindParam(2, $Password);
        $stmt->execute();


        $row = $stmt->fetch();

        return $row[0];

        $this->closeConn();

    }

    function register($Username, $Password, $Firstname, $Lastname, $Address, $Number){

        $this->openConn();

        $stmt = $this->dbh->prepare("INSERT INTO Customers (Username,Password,Firstname,Lastname,Address,Number) values (?,?,?,?,?,?)");
        $stmt->bindParam(1, $Username);
        $stmt->bindParam(2, $Password);
        $stmt->bindParam(3, $Firstname);
        $stmt->bindParam(4, $Lastname);
        $stmt->bindParam(5, $Address);
        $stmt->bindParam(6, $Number);
        $stmt->execute();
        $this->closeConn();

    }

    function user($Username){
        $this->openConn();

        $stmt = $this->dbh->prepare("SELECT Firstname,Lastname,Address,Number from Customers  where Username=?");
        $stmt->bindParam(1,$Username);

        $stmt->execute();

        $record = $stmt->fetch();


        $list = array("fname"=>$record[0], "lname"=>$record[1], "address"=>$record[2], "num"=>$record[3]);


        $json_string = json_encode($list);

        echo $json_string;

        $this->closeConn();
    }

    function searchname($name,$leng){

        $this->openConn();

        $stmt= $this->dbh->prepare("select * from Customers where Username like '".$name."%'");
        $stmt->execute();

        $this->closeConn();



        if($leng >= 5){

            $found = false;

            while($row = $stmt->fetch()){

                echo "<p id='alert1'><span class='label label-warning'>NOT AVAILABLE</span></p>";


                $found = true;
            }

            if(!$found){

                echo "<p id='alert1'><span class='label label-success'>AVAILABLE</span></p>";


            }
        }else{

            echo "<p id='alert1'><span class='label label-important'>TOO SHORT!</span></p>";

        }
    }

    function validname($name){

        $this->openConn();

        $stmt = $this->dbh->prepare("SELECT * FROM Customers WHERE Username=?");
        $stmt->bindParam(1,$name);
        $stmt->execute();


        if ($row = $stmt->fetch()) {

            return false;


        } else {


            return true;

        }

        $this->closeConn();
    }
    function validpass($leng){


        if($leng >= 5){

            echo "<p id='alert3'><span class='label label-success'>OK!</span></p>";


        }else{

            echo "<p id='alert3'><span class='label label-important'>TOO SHORT!</span></p>";

        }


    }
    function passmatch($pass1,$leng1,$pass2,$leng2){


        if($leng2 == $leng1){

            if($pass2 == $pass1){

                echo "<p id='alert2'><span class='label label-success'>PASSWORD MATCH</span></p>";

            }else{

                 echo "<p id='alert2'><span class='label label-warning'>PASSWORD NO MATCH</span></p>";

            }

            


        }else{

            echo "<p id='alert2'><span class='label label-warning'>PASSWORD NO MATCH</span></p>";

        }


    }




}

?>
