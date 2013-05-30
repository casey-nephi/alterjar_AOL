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
<html>
	<head>
		<title>LIBRARY</title>
		 <link rel="stylesheet" href="CSS/bootstrap.css"/>
         <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
         <link rel="stylesheet" href="CSS/bootstrap-responsive.css"/>
         <link rel="stylesheet" href="CSS/bootstrap-responsive.min.css"/>
         <script src="JS/bootstrap.js.js"></script>
         <script src="JS/bootstrap.min.js"></script> 
		 <script src="JS/jquery-1.8.2.min.js"></script>
		 <script src="JS/jquery-ui-1.10.0.custom.min.js"></script>
		 <link rel="stylesheet" href="CSS/jquery-ui-1.10.0.custom.min.css" />
		 <script src="JS/1.js"></script>
		 <link rel="stylesheet" href="CSS/index.css" />
		 <link rel="shortcut icon" href="images/Books-2.png"> 
	</head>

	<body>

         <div class="navbar navbar-inverse navbar-fixed-top">
			 <div class="navbar-inner">
                 <div class="container">
                   <h1 class="brand">ABUYOG'S ONLINE LIBRARY</h1><br/>
                     <div id="log-out">

                         <p id="hello" class="text-success">
                          WELCOME <?php if(isset($Username)) echo $Username ?>
                         </p>
                      <span class="label label-important"><a href="log_out.php">LOG-OUT</a></span>

                     </div>
                  </div>
			 </div> 
	     </div>
	     <br/><br/><br/><br/><br/>
		
		
			<div id="cssmenu">
				<ul class="nav nav-tabs">
					<li  id="action"><a href="#ta" data-toggle="tab"><img class="picmenu1" id="pica" src="images/a.png" >ACTION</a></li>
					<li  id="comedy"><a href="#tc" data-toggle="tab"><img class="picmenu1" id="picf" src="images/f.png" >COMEDY</a></li>
					<li  id="horror"><a href="#th" data-toggle="tab"><img class="picmenu1" id="picb" src="images/b.png" >HORROR</a></li>
					<li  id="love"><a href="#tl" data-toggle="tab"><img class="picmenu1" id="picl" src="images/l.png" >LOVE</a></li>

				</ul>
				
			</div><!--cssmenu-->
		
		    <div id="image">
				<table >
			      <tbody id="preimage"></tbody>
				</table>
            </div>
			<div id="bookmenu">
			<div  class="tab-pane active" id="tl">	
				<h3>LOVE Books</h3>
				<img class="picsearch"  src="images/bs.png" ><input type="text" id="s_l" class="search-query"placeholder="Enter Book Title" value=""><br /><br />
				<table class="table table-striped table-bordered">
		                <thead> 
							<tr>
								<th>ID</th>
								<th>BOOK</th>
								<th>RENT-PRICE(Php)</th>
								<th>STOCK</th>
								<th>RENT</th>
								<th>PRE-VIEW</th>
								
							</tr>
						</thead>

						<tbody id="tlb"></tbody>	
				
				</table>
			</div>
			<div class="tab-pane "  id="ta">
				<h3>ACTION Books</h3>
				<img class="picsearch"  src="images/bs.png" ><input type="text" id="s_a" class="search-query"placeholder="Enter Book Title" value=""><br /><br />
				<table class="table table-striped table-bordered">
		                <thead> 
							<tr>
								<th>ID</th>
								<th>BOOK</th>
								<th>RENT-PRICE(Php)</th>
								<th>STOCK</th>
								<th>RENT</th>
								<th>PRE-VIEW</th>
								
							</tr>
						</thead>

						<tbody id="tab"></tbody>	
				
				</table>
			</div>
			<div  class="tab-pane "  id="tc">
				<h3>COMEDY Books</h3>
				<img class="picsearch"  src="images/bs.png" ><input type="text" id="s_c" class="search-query"placeholder="Enter Book Title" value=""><br /><br />
				<table class="table table-striped table-bordered">
		                <thead> 
							<tr>
								<th>ID</th>
								<th>BOOK</th>
								<th>RENT-PRICE(Php)</th>
								<th>STOCK</th>
								<th>RENT</th>
								<th>PRE-VIEW</th>
								
							</tr>
						</thead>

						<tbody id="tcb"></tbody>	
				
				</table>
				</div>
			<div  class="tab-pane" data-toggle="tab"  id="th">
				<h3>HORROR Books</h3>
				<img class="picsearch"  src="images/bs.png" ><input type="text" id="s_h" class="search-query"placeholder="Enter Book Title" value=""><br /><br />
				<table class="table table-striped table-bordered">
		                <thead> 
							<tr>
								<th>ID</th>
								<th>BOOK</th>
								<th>RENT-PRICE(Php)</th>
								<th>STOCK</th>
								<th>RENT</th>
								<th>PRE-VIEW</th>
								
							</tr>
						</thead>

						<tbody id="thb"></tbody>	
				
				</table>
			</div>

		</div>
		<br /><br /><br />
		
			<br />

			<div id="order">

			 <input type="hidden" name="title">
			 <input type="hidden" name="rent">
			  <input type="hidden" name="stock">



	         <h2>ORDER INFO:</h2>

	         No. of Books to be Borrowed:

								           <select name="No_books">
	                                            <option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
	         									<option>5</option>
	                                            <option>6</option>
	                                            <option>7</option>
												<option>8</option>
	                                            <option>9</option>
	                                            <option>10</option>
								                </select><br />
			 Do you want it delivered?
			 <select name="deliver" >
	              <option>YES</option>
	              <option>NO</option>
			 </select><br /><br />

			<input type="hidden" name="fname"><br />
			<input type="hidden" name="lname"><br />
            <input type="hidden" name="address"><br />

			<br />
			<input type="hidden" name="num" /><br />

		    </div>
			
	        <div id="alert"> <br />
	         <p id="stock_alert"><img id="pic1" src="images/sad-icon.png" ><strong>SORRY WERE OUT OF STOCK</strong></p>
	                         <br />
	         <p id="add_alert"><img id="pic2" src="images/angry-icon.png" ><strong>MUST FILL ALL INPUT FIELDS</strong></p>
                <p id="hello"><strong>
                        WELCOME  <?php if(isset($Username)) echo $Username?>
                    </strong>
                </p>
	        </div>
	        
			

	</body>
</html>