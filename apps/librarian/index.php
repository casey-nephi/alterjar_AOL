
<?php
      session_start();
      if(!isset($_SESSION['Username'])){
            header('Location: log_in.php');
      }
      else{
            $Username= $_SESSION['Username'];
      }
    

?>


<!DOCTYPE html>
<html lang="en">
      <head>
            <link rel="stylesheet" href="css/bootstrap.css"/>
            <link rel="stylesheet" href="css/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/bootstrap-responsive.css"/>
            <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
            <script src="JS/bootstrap.js.js"></script>
            <script src="JS/bootstrap.min.js"></script>

            <link rel="stylesheet" href="css/index.css"/>
            <link rel="stylesheet" href="css/jquery-ui-1.10.0.css" />
	  		<style rel="stylesheet" type="text/css"></style>
           
            <script src="js/jquery-1.8.3.js"></script>
            <script src="js/jquery-ui-1.10.0.js"></script>
            <script src="js/Library.js"></script>
            
            
            <meta charset='utf-8'></meta>
            <title>ABUYOG'S ONLINE LIBRARY</title>
            <link rel="shortcut icon" href="images/Books-2.png"> 
       </head>
       <body >
       <div class="navbar navbar-inverse navbar-fixed-top">
           <div class="navbar-inner">
               <h1 class="brand">ABUYOG'S ONLINE LIBRARY</h1><br/>
               <div id="log-out">

                   <p id="hello" class="text-success">
                       WELCOME <?php if(isset($Username)) echo $Username ?>
                   </p>
                   <span class="label label-important"><a href="log_out.php">LOG-OUT</a></span>

               </div>
           </div>
       </div>
       <br/><br/><br/><br/><br/>

      <div class="row-fluid">
        <div class="span2">
      	<div id='divbackground'>



    	 <div  id="css1">
            <div class="well" style="max-width: 340px; padding: 8px 0;">
			<ul class="nav nav-list" >
                <li class="nav-header">VIEW ORDERS</li>
				<li id="d_books"><a href="#d_orders" >DELIVERIES</a></li>
				<li id="p_books"><a href="#p_orders" >PICK-UPS</a></li>
                <li class="divider"></li>
				<li class="nav-header">BOOKS</li>
				<li id="add"><a href="#add_form">ADD BOOKS</a></li>
				<li id="list"><a href="#v_menu">VIEW BOOKS</a></li>
                <li class="divider"></li>
				<li class="nav-header">RECORDS</li>
				<li id="borrower"><a href="#d_orders">BORROWERS</a></li>
				<li id="returns"><a href="#v_menu">RETURNED</a></li>
				<li id="dueDate"><a href="#v_menu">DUE DATE</a></li>
			</ul>
         </div>

			
		</div><!--cssmenu-->
        </div>
				     
				     
				      <hr/>
				      
				      
				     	<br/>
				     	
						<!--<button id="show_notice">SHOW NOTIFICATION</button>
						  	
						<div id="dialog_notification">
						
						  			<table id='contact_shared'>Contact</table>-->
						  			
						</div><!--div#dialog_notification-->
						<div id="pic">
						  	<img id="pic1" src="images/Windows-icon.png" >
						  	<img id="pic2" src="images/Internet-Explorer-icon.png" >
						  	<img id="pic3" src="images/laptop-icon.png" >
						  	<img id="pic4" src="images/Chrome.png" >
						  	<img id="pic5" src="images/Opera-icon.png" >
						  	<img id="pic6" src="images/fox.png" >
						  	<img id="pic7" src="images/Emails-Folder-icon.png" >
						  	
						  	
						</div><!--pic-->

			<div class="span10">
 				<div id="orders">



                    <div id="d_orders">

                    	<input type="hidden" id="name_stat_d">



                    	<h1 id="name_change">DELIVERIES</h1>
                    	
                    	<hr />

                        <div id="d_customer">
                            <h1 class="cust">Customers</h1>

                            <table class="table table-striped table-bordered" id="d">
                                <thead>
                                <tr>

                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>ORDERS</th>
                                    <th>INFO</th>
                                    <th>STATUS</th>

                                </tr>
                                </thead>

                                <tbody id="t_d"></tbody>
                            </table>
                        </div>

						<div id="d1_orders">
							<h1>RENTS</h1>
							<div class="show_name"><strong>Customer:</strong><p class="sname"></p></div>
						   
						<table class="table table-striped table-bordered" id="d1">
                             <thead>
                                <tr>

                                    <th>No. of Book Rent</th>
                                    <th>Title</th>
                                    <th>Rent price</th>


                                </tr>
                              </thead>

                            <tbody id="t_d1"></tbody>
                          
						</table>
					</div>


                    </div>


                    <div id="p_orders">

                    	<input type="hidden" id="name_stat_p">

                    	<h1 id="name_change1">PICK-UPS</h1>
                    	<div id="search_name_div"><input type="text" class="search-query" id="name_search" value="" placeholder="Enter Firstname"></div>
                    	<hr />

                        <div id="p_customer">
                            <h1 class="cust">Customers</h1>
                            <table class="table table-striped table-bordered" id="p">
                                <thead>
                                <tr>

                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>ORDERS</th>
                                    <th>INFO</th>
                                    <th id="stat">STATUS</th>

                                </tr>
                                </thead>
                                <tbody id="t_p"></tbody>
                            </table>

                        </div>

						<div id="p1_orders">
							<h1>RENTS</h1>
							<div class="show_name"><strong>Customer:</strong><p class="sname"></p></div>
						<table class="table table-striped table-bordered" id="p1">

                            <thead>
                            <tr>

                                <th>No. of Book Rent</th>
                                <th>Title</th>
                                <th>Rent price</th>


                            </tr>
                            </thead>
                            <tbody id="t_p1"></tbody>
                          
						</table>
					</div>

                    </div>

                    <div id="info_d">
                       <!--<table id="scroll" >
                          <tr id="row">
                            <th>ADDRESS(BRGY.)</th>
                            <th>Number</th>
                            <tbody id="info_t"></tbody>
                          </tr>
                       </table>-->
                       <strong id="date_change" >Date ordered :</strong><p id="H_d"></p>
                       <strong id="h_d">Due Date :</strong><p id="H_dd"></p>
                       <strong>ADDRESS(Brgy.) :</strong><p id="H_a"></p>
                       <strong>Number :</strong><p id="H_n"></p>
                       <strong>TOTAL(Php) :</strong><p id="H_p"></p> 
                    </div>
                      
                    
                      

 				</div>

 				 <div id="Books">


                    	<form id="add_form">
					         <fieldset>
							         <legend>Book Add Here!!</legend>
							        
							          Type:<select name="type">
                                             <option>love</option>                              
                                             <option>action</option>
                                                                      
                                             <option>horror</option>                                                                                                                                       

                                             <option>comedy</option>
							                </select><br />
							         Title:<input id="Title" type="text" name="Title" placeholder="Enter Title of Book"/><br/>
							         Rent Price: <input id="Rent" type="text" name="Rent" placeholder="Enter Rent Price of Book"/><br/>
							         Stock: <input id="Stock" type="text" name="Stock" placeholder="Enter Stock of Book"/><br/>
							        
							         
							  </fieldset>

				            
				            <button id="add_btn">ADD </button>
				         </form>


                        
                        


         <div id="v_menu">
         	<br />
         	<br />
         	<br />

            <div id="cssmenu">
                 <ul class="nav nav-tabs">
                     <li  id="action"><a href="#ta" data-toggle="tab"><img class="picmenu1" id="pica" src="images/a.png" >ACTION</a></li>
                     <li  id="comedy"><a href="#tc" data-toggle="tab"><img class="picmenu1" id="picha" src="images/happy.png" >COMEDY</a></li>
                     <li  id="horror"><a href="#th" data-toggle="tab"><img class="picmenu1" id="pics" src="images/s.png" >HORROR</a></li>
                     <li  id="love"><a href="#tl" data-toggle="tab"><img class="picmenu1" id="picl" src="images/l.png" >LOVE</a></li>

                 </ul>

             </div><!--cssmenu-->


        	<div  class="table" id="tl">	
			<h3>LOVE Books</h3>

			<table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BOOK</th>
                        <th>RENT-PRICE</th>
                        <th>STOCK</th>
                        <th>REMOVE</th>
                    </tr>
                </thead>
                <tbody id="tlb"></tbody>
			</table>
		</div>
		<div class="table"  id="ta">
			<h3>ACTION Books</h3>
			<table class="table table-striped table-bordered" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>BOOK</th>
                    <th>RENT-PRICE</th>
                    <th>STOCK</th>
                    <th>REMOVE</th>
                </tr>
                </thead>
                <tbody id="tab"></tbody>
			</table>
		</div>
		<div class="table"  id="tc">
			<h3>COMEDY Books</h3>
			<table class="table table-striped table-bordered"  >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>BOOK</th>
                    <th>RENT-PRICE</th>
                    <th>STOCK</th>
                    <th>REMOVE</th>
                </tr>
                </thead>
                <tbody id="tcb"></tbody>
			</table>
			</div>
		<div class="table"  id="th">
			<h3>HORROR Books</h3>
			<table class="table table-striped table-bordered"  >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>BOOK</th>
                    <th>RENT-PRICE</th>
                    <th>STOCK</th>
                    <th>REMOVE</th>
                </tr>
                </thead>
                <tbody id="thb"></tbody>
			</table>
		</div>


                        </div>




                    </div>
        <div id="alert"> <br />
        
         <p id="input"><img class="pic2" src="images/angry-icon.png" ><strong>MUST FILL ALL INPUT FIELDS</strong></p>
         <p id="delete"><img class="pic2" src="images/angry-icon.png" ><strong>ARE YOU SURE YOU WANT TO DELEE IT?</strong></p>
          <p id="pay"><img class="pic2" src="images/angry-icon.png" ><strong>ARE YOU SURE?</strong></p>
          <div id="pay1">

          	 <p><img class="pic2" src="images/angry-icon.png" ><strong>PENALTIES!!!!!!!!!</strong></p>
          	 <strong>TOTAL(Php):</strong><p id="penalty_pay"></p>

          </div>
         
        </div>
      </div>
      </div>

     
      </body>
</html>
