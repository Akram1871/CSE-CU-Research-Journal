<?php include 'header.php'; ?>
<?php include('database.php'); ?>
<?php
	if($_POST)
	{    // change this line.
		//Get variables from post array
		$id = $_POST['id'];
		$first_name = $_POST['first_name']; 
	    $last_name = $_POST['last_name']; 
        $session = $_['session'];
		$phone = $_POST['phone']; 
        $email = $_POST['email'];
        $age =  $_POST['age'];
		
		//create author query
		$query ="INSERT INTO author(author_id,first_name,last_name,phone,email)
								VALUES('$id','$first_name','$last_name','$phone','$email')";
		//Run query
		$mysqli->query($query);

		//Create customer query
		$query ="INSERT INTO student(id,first_name,last_name,age,session,phone,email)
								VALUES ('$id','$first_name','$last_name','$age','$session','$phone','$email')";
		//Run query
		$mysqli->query($query);

		
		$msg='Student Added';
		header('Location: add_publication.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Add Student</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li ><a href="index.php">Home</a></li>
          <li class="active"><a href="student.php">Student</a></li>
        </ul>
        <h3 class="text-muted">CSE CU</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Student</h2>
		 <form role="form" method="post" action="add_student.php">
		    <div class="form-group">
				<label>ID</label>
				<input name="id" type="number" class="form-control" placeholder="Enter ID">
			</div>
		 
			<div class="form-group">
				<label>First Name</label>
				<input name="first_name" type="text" class="form-control" placeholder="Enter First Name">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input name="last_name" type="text" class="form-control" placeholder="Enter Last Name">
			</div>
			<div class="form-group">
				<label>Session</label>
				<input name="session" type="text" class="form-control" placeholder="Enter session">
			</div>
			<div class="form-group">
				<label>Age</label>
				<input name="age" type="number" class="form-control" placeholder="Enter Age">
			</div>
			<div class="form-group">
				<label>phone</label>
				<input name="phone" type="number" class="form-control" placeholder="Enter phone number">
			</div>
			
			
			<div class="form-group">
				<label>Email address</label>
				<input name="email" type="email" class="form-control" placeholder="Enter Email">
			</div>
			
			<input type="submit" class="btn btn-default" value="Add Student" />
		</form>
        </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>



<?php include 'footer.php'; ?>