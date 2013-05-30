<?php
      
        session_start();
	include 'dao/UserDAO.php';
	$action = new UserDAO();

	if(!isset($_SESSION['Username'])){
	     if(isset($_POST['Username'])){
	                            $username=$_POST['Username'];
	                             $password=$_POST['Password'];
	                           if($action->logIn($username,$password)){
	                           
	                                  $_SESSION['Username']=$action->getUser($username,$password);
	                                  header('location:index.php');
	                           } 
	                           $errMsg="<div id='war'> <p>Wrong Username or Password</p> </div>" ;
		                  }
	     
	
	}else{
	                    
		                   header('location:index.php');
               }
               
    
               
?>

<!DOCTYPE html>
<html lang="en">
    <head>

         <link rel="stylesheet" href="css/bootstrap.css"/>
         <link rel="stylesheet" href="css/bootstrap.min.css"/>
         <link rel="stylesheet" href="css/bootstrap-responsive.css"/>
         <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
         <link rel="stylesheet" href="css/login.css"/>
         <link rel="stylesheet" href="css/jquery-ui-1.10.0.css" />
         <style rel="stylesheet" type="text/css"></style>
         <script src="JS/bootstrap.js.js"></script>
         <script src="JS/bootstrap.min.js"></script>
         <script src="js/jquery-1.8.3.js"></script>
         <script src="js/jquery-ui-1.10.0.js"></script>
         <script src="js/log-in.js"></script>
         <meta charset="utf-8">
         <title>ABUYOG'S ONLINE LIBRARY</title>
         <link rel="shortcut icon" href="images/Books-2.png"> 
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">


            <div class="container">
                <h1 class="brand">ABUYOG'S ONLINE LIBRARY</h1><br/>
                <button class="btn btn-info" id="change">CHANGE LIBRARIAN</button>

                <form class="form-inline" id="login_form" method="POST" >

                    Username:<input type="text" name="Username" placeholder="ENTER USERNAME"/>
                    Password:<input type="password" name="Password" placeholder="ENTER PASSWORD"/>

                    <button class="btn btn-primary" >Log-in</button>

                </form>
                <button class=" btn-link" id="hint">Forgot password?</button>
            <d/iv>


        </div>
    </div>
       
        
        <br /><br />
        
         <?php if (isset($errMsg)) echo $errMsg; ?>


            <br/>
            <br/>
            <div id="update_form" >
                <input type="hidden" name="test_user" /> 
                <input type="hidden" name="test_pass" />
                <input type="hidden" name="id" value="1" />           
             <form>

                <fieldset>
                    <fieldset>
                    <legend>ENTER CURRENT LIBRARIAN AND PASSWORD HERE</legend>
                    
                    Librarian:<input type="text" name="Username1"/><br/>
                    Password:<input type="password" name="Password1"/>
                    </fieldset>
                    <fieldset>
                    <legend>ENTER NEW LIBRARIAN AND PASSWORD HERE</legend>
                    
                    Librarian:<input type="text" name="Username2"/><br/>
                    Password:<input type="password" name="Password2"/><br/>
                    Password:<input type="password" name="Password3" placeholder="RE-ENTER PASSWORD"/><br/>
                    Hint:<input type="text" name="hint" />
                    </fieldset>
                </fieldset>
                
               
            </form>
            </div>
         <div id="alert"> <br />
         <p id="pass"><img id="pic1" src="images/angry-icon.png" ><strong>PASS WORD DOESN'T MATCH!!!!!!!!!!!!!!!!!!!!!</strong></p>
                         <br />
         <p id="input"><img id="pic2" src="images/angry-icon.png" ><strong>MUST FILL ALL INPUT FIELDS!!!!!!!!!!!!!!!</strong></p>
         <p id="librarian"><img id="pic3" src="images/angry-icon.png" ><strong>WRONG CURRENT LIBRARIAN!!!!!!!!!!!!!!!!!!!!</strong></p>

        </div>
        <div id="answer">
              <strong>Hint:</strong> 
              <p id="question_hint"></p>
        </div>
                    
        
    </body>   
     
</html>
