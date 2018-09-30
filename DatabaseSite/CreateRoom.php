<?php 
	
	require 'database.php';

		if ( !empty($_POST)) {

		// keep track validation errors
		$RoomIDError = null;
		$RoomBuildingError = null;
		$RoomCapacityError = null;
		$RoomAVFacilitiesError = null;
		

		
		// keep track post values
		$RoomID = $_POST['RoomID'];
		$RoomBuilding = $_POST['RoomBuilding'];
		$RoomCapacity = $_POST['RoomCapacity'];
		$RoomAVFacilities= $_POST['RoomAVFacilities'];
				
		
		

		
		// insert data
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO ROOM (RoomID,RoomBuilding,RoomCapacity,RoomAVFacilities) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($RoomID,$RoomBuilding,$RoomCapacity,$RoomAVFacilities));
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
		    			<h3>Create a Room</h3>
		    		
    		
	    			<form class="form" action="CreateRoom.php" method="post">
					  <div class="form-group" >
					    <label >RoomID</label>
					   
					      	<input name="RoomID" type="text" class="form-control" placeholder="RoomID" required>
							
					      
					   
					  </div>
					  <div class="form-group ">
					    <label >RoomBuilding</label>
					    
					      	<input name="RoomBuilding" type="text" class="form-control" placeholder="RoomBuilding" required>
					      	
					    
					   
					  </div>
					  <div class="form-group ">
					    <label >RoomCapacity</label>
					   
					      	<input name="RoomCapacity" type="text" class="form-control" placeholder="RoomCapacity" required>
					   
					    
					  </div>

 					 <div class="form-group ">
					    <label >RoomAVFacilities</label>
					   
					      	<input name="RoomAVFacilities" type="text" class="form-control" placeholder="RoomAVFacilities" required>
					   
					    
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