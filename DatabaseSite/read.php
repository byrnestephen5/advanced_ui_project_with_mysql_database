<?php 
	require 'database.php';
	$LecturerID = null;
	if ( !empty($_GET['LecturerID'])) {
		$LecturerID = $_REQUEST['LecturerID'];
	}
	
	if ( null==$LecturerID ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM LECTURER where LecturerID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($LecturerID));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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

<style>
.panel-heading {
font-weight: bold;
}
</style>


</head>

<body>


<div class="container">
  <h2>Read a Lecturer</h2>
  <div class="panel panel-info">
    <div class="panel-heading">Lecturer ID</div>
    <div class="panel-body"><?php echo $data['LecturerID'];?></div>
  <div class="panel-heading">First Name</div>
    <div class="panel-body"><?php echo $data['LecturerFirstName'];?></div>
<div class="panel-heading">Middle Initial</div>
    <div class="panel-body"><?php echo $data['LecturerMiddleInitial'];?></div>
<div class="panel-heading">Last Name</div>
    <div class="panel-body"><?php echo $data['LecturerLastName'];?></div>
<div class="panel-heading">Address Line1</div>
    <div class="panel-body"><?php echo $data['LecturerAddressLine1'];?></div>
<div class="panel-heading">Town</div>
    <div class="panel-body"><?php echo $data['LecturerTown'];?></div>
<div class="panel-heading">County</div>
    <div class="panel-body"><?php echo $data['LecturerCounty'];?></div>
<div class="panel-heading">Start Date</div>
    <div class="panel-body"><?php echo $data['LecturerStartDate'];?></div>
<div class="panel-heading">Phone Number</div>
	<div class="panel-body"><?php echo $data['LecturerPhoneNumber'];?></div>
<div class="panel-heading">DOB</div>
	<div class="panel-body"><?php echo $data['LecturerDOB'];?></div>
<div class="panel-heading">Email</div>
	<div class="panel-body"><?php echo $data['LecturerEmail'];?></div>



</div>












					    <div class="form-actions">
						  <a class="btn btn-primary " href="index.php">Back</a>
					   </div>
					
					 
</div><!-- /container -->
  </body>
</html>