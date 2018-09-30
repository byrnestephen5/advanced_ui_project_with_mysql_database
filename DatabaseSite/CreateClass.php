<?php 
	
	require 'database.php';

		if ( !empty($_POST)) {

		// keep track validation errors
		$ClassIDError = null;
		$LecturerIDError = null;
		$RoomIDError = null;
		$ClassDescriptionError = null;
		$ClassDateError = null;
		$ClassTimeError = null;
		$ClassReadingMaterial = null;
		
		// keep track post values
		$ClassID = $_POST['ClassID'];
		$LecturerID = $_POST['LecturerID'];
		$RoomID = $_POST['RoomID'];
		$ClassDescription = $_POST['ClassDescription'];
		$ClassDate = $_POST['ClassDate'];		
		$ClassTime = $_POST['ClassTime'];
		$ClassReadingMaterial = $_POST['ClassReadingMaterial'];
		

		
		// insert data
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO CLASS(ClassID,LecturerID,RoomID,ClassDescription,ClassDate,ClassTime,ClassReadingMaterial) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($ClassID,$LecturerID,$RoomID,$ClassDescription,$ClassDate,$ClassTime,$ClassReadingMaterial));
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
		    			<h3>Create Class</h3>
		    		
    		
	    			<form class="form" action="CreateClass.php" method="post">
					  <div class="form-group" >
					    <label >ClassID</label>
					   
					      	<input name="ClassID" type="text" class="form-control" placeholder="ClassID" required>
					  </div>

					  <div class="form-group ">
					    <label >LecturerID</label>
					      	<input name="LecturerID" type="text" class="form-control" placeholder="LecturerID" required>
					  </div>


					  <div class="form-group ">
					    <label >RoomID</label>
					      	<input name="RoomID" type="text" class="form-control" placeholder="RoomID" required>
					  </div>


					  <div class="form-group ">
					    <label >ClassDescription</label>
					      	<input name="ClassDescription" type="text" class="form-control" placeholder="ClassDescription" required>
					  </div>

					  <div class="form-group ">
					    <label >ClassDate</label>
					      	<input name="ClassDate" type="text" class="form-control" placeholder="ClassDate" required>
					  </div>

					  <div class="form-group ">
					    <label >ClassTime</label>
					      	<input name="ClassTime" type="text" class="form-control" placeholder="ClassTime" required>
					  </div>
										  
					  <div class="form-group ">
					    <label >ClassReadingMaterial</label>
					      	<input name="ClassReadingMaterial" type="text" class="form-control" placeholder="ClassReadingMaterial" required>
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