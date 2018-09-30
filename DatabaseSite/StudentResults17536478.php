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
<div class="row">
  
   
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Welcome Stephen</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="StudentResults17536478.php">Results Student 17536478</a></li>  
            <li><a href="TotalStudentsEnrolled.php">Total Students Enrolleed</a></li>
            <li><a href="FemaleStudents.php">Female Students</a></li>
            <li><a href="RoomCapacity.php">Room Capacity</a></li>
          </ul>
        </li>
  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Forms <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="create.php">Create a Lecturer</a></li>
            <li><a href="CreateRoom.php">Create a Room</a></li>
            <li><a href="CreateModule.php">Create a Module</a></li>
 	    <li><a href="CreateClass.php">Create Class</a></li>



          </ul>
        </li>
        <li><a href="#">Dash Board</a></li>
        <li><a href="#">Main Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

  
</div>
</div>

    <div class="container">
    		<div class="row">
<br>
<br>
<br><br>


    			<h3>Student 17536478 Results </h3>
    		</div>
			<div class="row">
				<p>
					<a href="" class="btn btn-success">Print</a>
					
				</p>
				</div>
				<div class="row">
				 <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
		              <thead>
		                <tr>
		                  <th>ModuleID</th>
		                  <th>StudentID</th>
		                  <th>Date</th>
		                  <th>Percentage</th>
				  <th>Grade</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM RESULT WHERE StudentID = 17536478';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['ModuleID'] . '</td>';
								echo '<td>'. $row['StudentID'] . '</td>';
							   	echo '<td>'. $row['ResultDate'] . '</td>';
								echo '<td>'. $row['ResultPercentage'] . '</td>';
							   	echo '<td>'. $row['ResultGrade'] . '</td>';
								
								
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				</div>
				</div>
    	</div>
    </div> <!-- /container -->
  </body>
</html>