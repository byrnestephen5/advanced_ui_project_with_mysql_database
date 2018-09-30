<?php 
	
	require 'database.php';

		if ( !empty($_POST)) {

		// keep track validation errors
		$ModuleIDError = null;
		$ModuleHoursError = null;
		$ModuleTitleError = null;
		$ModuleSyllabusError = null;
		$ModuleCreditPointsError = null;

		
		// keep track post values
		$ModuleID = $_POST['ModuleID'];
		$ModuleHours = $_POST['ModuleHours'];
		$ModuleTitle = $_POST['ModuleTitle'];
		$ModuleSyllabus= $_POST['ModuleSyllabus'];
		$ModuleCreditPoints= $_POST['ModuleCreditPoints'];		
		
		

		
		// insert data
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO MODULE (ModuleID,ModuleHours,ModuleTitle,ModuleSyllabus,ModuleCreditPoints) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($ModuleID,$ModuleHours,$ModuleTitle,$ModuleSyllabus,ModuleCreditPoints));
			Database::disconnect();
			header("Location: index.php");
		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="jquery-3.1.1.min.js"></script>
   <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>








</head>

<body>
<br>
<br>
<br>
<br>
    <div class="container">
    
    			
    				<div class="row">
					<div class="col-sm-1"></div> 
					<div class="col-sm-10"> 
					<div class="jumbotron">
		    			<h3>Create a Module</h3>
		    		
    		
	    			<form class="form" action="CreateModule.php" method="post">
					  <div class="form-group" >
					    <label >ModuleID</label>
					   
					      	<input name="ModuleID" type="text" class="form-control" placeholder="ModuleID" required>
							
					      
					   
					  </div>
					  <div class="form-group ">
					    <label >ModuleHours</label>
					    
					      	<input name="ModuleHours" type="text" class="form-control" placeholder="ModuleHours" required>
					      	
					    
					   
					  </div>
					  <div class="form-group ">
					    <label >ModuleTitle</label>
					   
					      	<input name="ModuleTitle" type="text" class="form-control" placeholder="ModuleTitle" required>
					   
					    
					  </div>

 					 <div class="form-group ">
					    <label >ModuleSyllabus</label>
					   
					      	<input name="ModuleSyllabus" type="text" class="form-control" placeholder="ModuleSyllabus" required>
					   
					    
					  </div>
					  
					   <div class="form-group ">
					    <label >ModuleCreditPoints</label>
					   
					      	<input name="ModuleCreditPoints" type="text" class="form-control" placeholder="ModuleCreditPoints" required>
					   
					    
					  </div>
			 		

					  <div class="form-actions form-group">
						  
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn btn-primary" href="index.php">Back</a>
						
						</div>
					</form>
					</div>
					</div>
					</div>
					<div class="col-sm-1"></div>
				
    </div> <!-- /container -->
  </body>
</html>