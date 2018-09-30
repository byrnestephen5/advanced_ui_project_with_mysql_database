<?php 
	
	require 'database.php';

	$LecturerID = null;
	if ( !empty($_GET['LecturerID'])) {
		$LecturerID= $_REQUEST['LecturerID'];
	}
	
	if ( null==$LecturerID ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		
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
		
		// validate input
		

		$valid = true;
		if (empty($LecturerFirstName)) {
			$LecturerFirstNameError = 'Please enter LecturerFirstName';
			$valid = false;
		}

		$valid = true;
		if (empty($LecturerMiddleInitial)) {
			$LecturerMiddleInitialError = 'Please enter LecturerMiddleInitial';
			$valid = false;
		}

		$valid = true;
		if (empty($LecturerLastName)) {
			$LecturerLastNameError = 'Please enter LecturerLastName';
			$valid = false;
		}

		$valid = true;
		if (empty($LecturerAddressLine1)) {
			$LecturerAddressLine1Error = 'Please enter LecturerAddressLine1';
			$valid = false;
		}
		

		$valid = true;
		if (empty($LecturerTown)) {
			$LecturerTownError = 'Please enter LecturerTown';
			$valid = false;
		}
		
		$valid = true;
		if (empty($LecturerCounty)) {
			$LecturerCountyError = 'Please enter LecturerCounty';
			$valid = false;
		}

		$valid = true;
		if (empty($LecturerStartDate)) {
			$LecturerStartDateError = 'Please enter LecturerStartDate';
			$valid = false;
		}

		$valid = true;
		if (empty($LecturerPhoneNumber)) {
			$LecturerPhoneNumberError = 'Please enter LecturerPhoneNumber';
			$valid = false;
		}
		
		$valid = true;
		if (empty($LecturerDOB )) {
			$LecturerDOBError = 'Please enter LecturerDOB';
			$valid = false;
		}



		if (empty($LecturerEmail)) {
			$LecturerEmailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($LecturerEmail,FILTER_VALIDATE_EMAIL) ) {
			$LecturerEmailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE  LECTURER set LecturerFirstName = ?, LecturerMiddleInitial = ?,LecturerLastName = ?,LecturerAddressLine1 = ?,LecturerTown = ?,LecturerCounty = ?,LecturerStartDate = ?,LecturerPhoneNumber = ?,LecturerDOB = ?,LecturerEmail = ? WHERE LecturerID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($LecturerFirstName,$LecturerMiddleInitial,$LecturerLastName,$LecturerAddressLine1,$LecturerTown,$LecturerCounty,$LecturerStartDate,$LecturerPhoneNumber,$LecturerDOB,$LecturerEmail,$LecturerID));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM LECTURER where LecturerID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($LecturerID));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$LecturerFirstName = $data['LecturerFirstName'];
		$LecturerMiddleInitial = $data['LecturerMiddleInitial'];
		$LecturerLastName = $data['LecturerLastName'];
		$LecturerAddressLine1 = $data['LecturerAddressLine1'];
		$LecturerTown = $data['LecturerTown'];
		$LecturerCounty = $data['LecturerCounty'];
		$LecturerStartDate = $data['LecturerStartDate'];
		$LecturerPhoneNumber = $data['LecturerPhoneNumber'];
		$LecturerDOB = $data['LecturerDOB'];
		$LecturerEmail = $data['LecturerEmail'];

		Database::disconnect();
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
    <div class="container">
    <div class="jumbotron " style="background-color:#94b8b8;">
    			<div class="span10 offset1">
    			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
		    			<h3>Update a Lecturer</h3>
		    		</div>
				<div class="col-sm-4"></div>
				</div>
    		<div class="row"> 
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
	    			<form class="form-horizontal" action="update.php?LecturerID=<?php echo $LecturerID?>" method="post">
					  
					
					  
					  <div class="control-group  <?php echo !empty($LecturerFirstNameError)?'error':'';?>">
					    <label class="control-label">LecturerFirstName</label>
					    <div class="controls form-group">
					      	<input name="LecturerFirstName" class="form-control" type="text" placeholder="LecturerFirstName" value="<?php echo !empty($LecturerFirstName)?$LecturerFirstName:'';?>">
					      	<?php if (!empty($LecturerFirstNameError)): ?>
					      		<span class="help-inline"><?php echo $LecturerFirstNameError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>


					  <div class="control-group <?php echo !empty($LecturerMiddleInitialError)?'error':'';?>">
					    <label class="control-label">LecturerMiddleInitial</label>
					    <div class="controls form-group ">
					      	<input name="LecturerMiddleInitial" class="form-control" type="text"  placeholder="LecturerMiddleInitial" value="<?php echo !empty($LecturerMiddleInitial)?$LecturerMiddleInitial:'';?>">
					      	<?php if (!empty($LecturerMiddleInitialError)): ?>
					      		<span class="help-inline"><?php echo $LecturerMiddleInitialError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($LecturerLastNameError)?'error':'';?>">
					    <label class="control-label">LecturerLastName</label>
					    <div class="controls form-group">
					      	<input name="LecturerLastName" class="form-control" type="text"  placeholder="LecturerLastName" value="<?php echo !empty($LecturerLastName)?$LecturerLastName:'';?>">
					      	<?php if (!empty($LecturerLastNameError)): ?>
					      		<span class="help-inline"><?php echo $LecturerLastNameError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($LecturerAddressLine1)?'error':'';?>">
					    <label class="control-label">LecturerAddressLine1</label>
					    <div class="controls form-group">
					      	<input name="LecturerAddressLine1" class="form-control" type="text"  placeholder="LecturerAddressLine1" value="<?php echo !empty($LecturerAddressLine1)?$LecturerAddressLine1:'';?>">
					      	<?php if (!empty($LecturerAddressLine1Error)): ?>
					      		<span class="help-inline"><?php echo $LecturerAddressLine1Error;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group  <?php echo !empty($LecturerTown)?'error':'';?>">
					    <label class="control-label">LecturerTown</label>
					    <div class="controls form-group">
					      	<input name="LecturerTown" class="form-control" type="text"  placeholder="LecturerTown" value="<?php echo !empty($LecturerTown)?$LecturerTown:'';?>">
					      	<?php if (!empty($LecturerTownError)): ?>
					      		<span class="help-inline"><?php echo $LecturerTownError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($LecturerCounty)?'error':'';?>">
					    <label class="control-label">LecturerCounty</label>
					    <div class="controls form-group">
					      	<input name="LecturerCounty" class="form-control" type="text"  placeholder="LecturerCounty" value="<?php echo !empty($LecturerCounty)?$LecturerCounty:'';?>">
					      	<?php if (!empty($LecturerCountyError)): ?>
					      		<span class="help-inline"><?php echo $LecturerCountyError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
						<div class="control-group <?php echo !empty($LecturerStartDate)?'error':'';?>">
   					 <label class="control-label">LecturerStartDate</label>
					    <div class="controls form-group">
					      	<input name="LecturerStartDate" class="form-control" type="text"  placeholder="LecturerStartDate" value="<?php echo !empty($LecturerStartDate)?$LecturerStartDate:'';?>">
					      	<?php if (!empty($LecturerStartDateError)): ?>
					      		<span class="help-inline"><?php echo $LecturerStartDateError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($LecturerPhoneNumber)?'error':'';?>">
   					 <label class="control-label">LecturerPhoneNumber</label>
					    <div class="controls form-group">
					      	<input name="LecturerPhoneNumber" class="form-control" type="text"  placeholder="LecturerPhoneNumber" value="<?php echo !empty($LecturerPhoneNumber)?$LecturerPhoneNumber:'';?>">
					      	<?php if (!empty($LecturerPhoneNumberError)): ?>
					      		<span class="help-inline"><?php echo $LecturerPhoneNumberError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  
					<div class="control-group <?php echo !empty($LecturerDOB)?'error':'';?>">
   					 <label class="control-label">LecturerDOB</label>
					    <div class="controls form-group">
					      	<input name="LecturerDOB" class="form-control" type="text"  placeholder="LecturerDOB" value="<?php echo !empty($LecturerDOB)?$LecturerDOB:'';?>">
					      	<?php if (!empty($LecturerDOBError)): ?>
					      		<span class="help-inline"><?php echo $LecturerDOBError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

   					 
					 <div class="control-group <?php echo !empty($LecturerEmail)?'error':'';?>">
					 <label class="control-label">LecturerEmail</label>
					    <div class="controls form-group">
					      	<input name="LecturerEmail" class="form-control" type="text"  placeholder="LecturerEmail" value="<?php echo !empty($LecturerEmail)?$LecturerEmail:'';?>">
					      	<?php if (!empty($LecturerEmailError)): ?>
					      		<span class="help-inline"><?php echo $LecturerEmailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <br>
					  <br>
					  
					  



					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn btn-primary" href="index.php">Back</a>
						</div>
					</form>
				
				</div>
				<div class="col-sm-4"></div>
				</div>
				</div>
	</div>			
    </div> <!-- /container -->
  </body>
</html>