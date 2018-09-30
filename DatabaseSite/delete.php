<?php 
	require 'database.php';
	$LecturerID = 0;
	
	if ( !empty($_GET['LecturerID'])) {
		$LecturerID = $_REQUEST['LecturerID'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$LecturerID = $_POST['LecturerID'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM LECTURER  WHERE LecturerID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($LecturerID));
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
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a Lecturer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="LecturerID" value="<?php echo $LecturerID;?>"/>
					  <p class="alert alert-danger">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						  <a class="btn btn-primary" href="index.php">Cancel</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>