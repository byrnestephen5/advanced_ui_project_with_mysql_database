<?php 
	
	require 'database.php';

		if ( !empty($_POST)) {

		// keep track validation errors
		$LecturerIDError = null;
		$LecturerFirstNameError = null;
		$LecturerMiddleInitialError = null;
		$LecturerLastNameError = null;
		$LecturerAddressLine1Error = null;
		$LecturerTownError = null;
		$LecturerCountyError = null;
		$LecturerStartDateError = null;
		$LecturerPhoneNumberError = null;
		$LecturerDOBError = null;
		$LecturerEmailError = null;

		
		// keep track post values
		$LecturerID = $_POST['LecturerID'];
		$LecturerFirstName = $_POST['LecturerFirstName'];
		$LecturerMiddleInitial = $_POST['LecturerMiddleInitial'];
		$LecturerLastName= $_POST['LecturerLastName'];
		$LecturerAddressLine1 = $_POST['LecturerAddressLine1'];
		$LecturerTown= $_POST['LecturerTown'];
		$LecturerCounty= $_POST['LecturerCounty'];
		$LecturerStartDate = $_POST['LecturerStartDate'];
		$LecturerPhoneNumber = $_POST['LecturerPhoneNumber'];
		$LecturerDOB = $_POST['LecturerDOB'];
		$LecturerEmail = $_POST['LecturerEmail'];		
		
		

		
		// insert data
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO LECTURER (LecturerID,LecturerFirstName,LecturerMiddleInitial,LecturerLastName,LecturerAddressLine1,LecturerTown,LecturerCounty,LecturerStartDate,LecturerPhoneNumber,LecturerDOB,LecturerEmail) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($LecturerID,$LecturerFirstName,$LecturerMiddleInitial,$LecturerLastName,$LecturerAddressLine1,$LecturerTown,$LecturerCounty,$LecturerStartDate,$LecturerPhoneNumber,$LecturerDOB,$LecturerEmail));
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
		    			<h3>Create a Lecturer</h3>
		    		
    		
	    			<form class="form" action="create.php" method="post">
					  <div class="form-group" >
					    <label >LecturerID</label>
					   
					      	<input name="LecturerID" type="text" class="form-control" placeholder="LecturerID" required>
							
					      
					   
					  </div>
					  <div class="form-group ">
					    <label >LecturerFirstName</label>
					    
					      	<input name="LecturerFirstName" type="text" class="form-control" placeholder="LecturerFirstName" required>
					      	
					    
					   
					  </div>
					  <div class="form-group ">
					    <label >LecturerMiddleInitial</label>
					   
					      	<input name="LecturerMiddleInitial" type="text" class="form-control" placeholder="LecturerMiddleInitial" required>
					   
					    
					  </div>

 					 <div class="form-group ">
					    <label >LecturerLastName</label>
					   
					      	<input name="LecturerLastName" type="text" class="form-control" placeholder="LecturerLastName" required>
					   
					    
					  </div>
			 		<div class="form-group ">
					    <label >LecturerAddressLine1</label>
					   
					      	<input name="LecturerAddressLine1" type="text" class="form-control" placeholder="LecturerAddressLine1" required>
					   
					    
					  </div>

			 		<div class="form-group ">
					    <label >LecturerTown</label>
					   
					      	<input name="LecturerTown" type="text" class="form-control" placeholder="LecturerTown" required>
					   
					    
					  </div>
		 			<div class="form-group ">
					    <label >LecturerCounty</label>
					   
					      	<input name="LecturerCounty" type="text" class="form-control" placeholder="LecturerCounty" required>
					   
					    
					  </div>
					<div class="form-group ">
					    <label >LecturerStartDate</label>
					   
					      	<input name="LecturerStartDate" type="text" class="form-control" placeholder="LecturerStartDate" required>
					   
					    
					  </div>
					<div class="form-group ">
					    <label >LecturerPhoneNumber</label>
					   
					      	<input name="LecturerPhoneNumber" type="text" class="form-control" placeholder="LecturerPhoneNumber" required>
					   
					    
					  </div>
					<div class="form-group ">
					    <label >LecturerDOB</label>
					   
					      	<input name="LecturerDOB" type="text" class="form-control" placeholder="LecturerDOB" required>
					   
					    
					  </div>
  					
					<div class="form-group ">
					    <label >LecturerEmail</label>
					   
					      	<input name="LecturerEmail" type="text" class="form-control" placeholder="LecturerEmail" required>
					   
					    
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