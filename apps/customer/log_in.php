<?php
      
    session_start();

	include 'DAO/UserDao.php';

	$action = new UserDao();

	if(!isset($_SESSION['Username'])){

        if(isset($_POST['Username'])){

	                            $username=$_POST['Username'];
	                            $password=$_POST['Password'];

             if($action->logIn($username,$password)){
	                           
	                                  $_SESSION['Username']=$action->getUser($username,$password);

	                                  header('location: index.php');
	                           }

	                           $errMsg="<div id='war'> <img id='war1' src='images/War.png' ><p>Wrong Username or Password</p> </div>" ;   
		}
	     
	
	}else{
	                    
		                   header('location: index.php');
    }
               
    
               
?>

<!DOCTYPE html>
<html lang="en">
    <head>
         <link rel="stylesheet" href="CSS/bootstrap.css"/>
         <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
         <link rel="stylesheet" href="CSS/bootstrap-responsive.css"/>
         <link rel="stylesheet" href="CSS/bootstrap-responsive.min.css"/>
         <link rel="stylesheet" href="CSS/login.css"/>
         <link rel="stylesheet" href="CSS/jquery-ui-1.10.0.css" />
         <style rel="stylesheet" type="text/css"></style>
         <script src="JS/bootstrap.js.js"></script>
         <script src="JS/bootstrap.min.js"></script>
         <script src="JS/jquery-1.8.3.js"></script>
         <script src="JS/jquery-ui-1.10.0.js"></script>
         <script src="JS/log-in.js"></script>
         <meta charset="utf-8">
         <title>ABUYOG'S ONLINE LIBRARY</title>
         <link rel="shortcut icon" href="images/Books-2.png"> 
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="navbar-inner">
           <h1 class="brand">ABUYOG'S ONLINE LIBRARY</h1><br/>
           
              <form class="form-inline" id="login_form" method="POST" >
                    
                       <input type="text" name="Username" id="Username" placeholder="ENTER USERNAME"/>
                       <input type="password" name="Password" id="Password" placeholder="ENTER PASSWORD"/>
                    
                    <button class="btn btn-primary" >Log-in</button>
                </form>
           
          </div> 
          </div>
        
        
        <?php if (isset($errMsg)) echo $errMsg; ?>
        
             <div id="register_form">
                <form action="register.php" method="POST">
                    <fieldset>
                        <legend>Register HERE!!</legend>
                        <p id="alert1"> <span class="label label-info">ENTER</span></p>
                        Username :<input type="text" name="Username1" id="Username1"  placeholder="ENTER USERNAME"/><br/>
                                  <input type="hidden" name="Username2" id="Username2"/>
                       <p id="alert3"> <span class="label label-info">ENTER</span></p>
                        Password :<input type="password" name="Password1" id="pass"/  placeholder="ENTER PASSWORD"><br/>
                                  <input type="hidden" name="Password3" id="pass3"/>
                        <div id="passto">          
                       <p id="alert2"> <span class="label label-info">ENTER</span></p>
                        Password :<input type="password" name="Password2" id="pass1"  placeholder="RE-ENTER PASSWORD"/><br/>
                        </div>
                       <p id="alert4"> <span class="label label-info">ENTER</span></p>
                        FirstName:<input type="text" name="firstname" id="fname"/><br/>
                       <p id="alert5"> <span class="label label-info">ENTER</span></p>
                        LastName :<input type="text" name="lastname" id="lname"/><br/>
                        Address:Brgy.<select name="address">

                                <option>Alangilan</option>
                                <option>Anibongon</option>
                                <option>Buaya</option>
                                <option>Bagacay</option>
                                <option>Bahay</option>
                                <option>Balinsasayao</option>
                                <option>Balocawe</option>
                                <option>Balocawehay</option>
                                <option>Barayong</option>
                                <option>Bayabas</option>
                                <option>Bito (Pob.)</option>
                                <option>Buenavista</option>
                                <option>Bulak</option>
                                <option>Buntay (Pob.)</option>
                                <option>Burubud-an</option>
                                <option>Cagbolo</option>
                                <option>Can-aporong</option>
                                <option>Canmarating</option>
                                <option>Can-uguib (Pob.)</option>
                                <option>Capilian</option>
                                <option>Cadac-an</option>
                                <option>Combis</option>
                                <option>Dingle</option>
                                <option>Guintagbucan (Pob.)</option>
                                <option>Hampipila</option>
                                <option>Katipunan</option>
                                <option>Kikilo</option>
                                <option>Laray</option>
                                <option>Lawa-an</option>
                                <option>Libertad</option>
                                <option>Loyonsawang (Pob.)</option>
                                <option>Mahagna (New Cagbolo)</option>
                                <option>Mag-atubang</option>
                                <option>Mahayahay</option>
                                <option>Maitum</option>
                                <option>Malaguicay</option>
                                <option>Matagnao</option>
                                <option>Nalibunan (Pob.)</option>
                                <option>Nibga</option>
                                <option>Odiongan</option>
                                <option>Pagsang-an</option>
                                <option>Paguite</option>
                                <option>Parasanon</option>
                                <option>Picas Sur</option>
                                <option>Pilar</option>
                                <option>Pinamanagan</option>
                                <option>Salvasion</option>
                                <option>San Francisco</option>
                                <option>San Isidro</option>
                                <option>San Roque</option>
                                <option>Santa Fee (Pob.)</option>
                                <option>Santa Lucia</option>
                                <option>Santo Nino (Pob.)</option>
                                <option>Tabigue</option>
                                <option>Tadoc</option>
                                <option>New Taligue</option>
                                <option>Old Taligue</option>
                                <option>Tib-o</option>
                                <option>Tinalian</option>
                                <option>Tinocolan</option>
                                <option>Tuy-a</option>
                                <option>Victory (Pob.)</option>


                            </select> Abuyog,Leyte
                            <br />
                            <p id="alert6"> <span class="label label-info">ENTER</span></p>
                            Number:<input type="text" name="number" id="num"/><br/>
                    </fieldset>
                    <button class="btn btn-primary" >REGISTER</button>
                </form>

            </div>

         
                    
        
    </body>   
     
</html>
