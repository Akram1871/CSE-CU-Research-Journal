<?php include 'header.php'; ?>
<?php include('database.php'); ?>
<?php
	if($_POST){
		//Get variables from post array
		$author_id = $_POST['author_id'];
		$publication_id = $_POST['publication_id'];
		$title = $_POST['title']; 
	    $publisher = $_POST['publisher']; 
        $year = $_POST['year']; 
        $location = $_POST['location'];
        $file_name = $_POST['file_name'];
		
		
		$query ="INSERT INTO publication_author(publication_id,author_id)
					VALUES ('$publication_id','$author_id')";

			$mysqli->query($query);
		//Create customer query
		$query ="INSERT INTO publication(publication_id,title,publisher,year)
								VALUES ('$publication_id','$title','$publisher','$year')";
		//Run query
		$mysqli->query($query);

		$query ="INSERT INTO paper(publication_id,location,file_name)
								VALUES ('$publication_id','$location','$file_name')";
		//Run query
		$mysqli->query($query);
		
		
	
		
		$msg='publisher Added';
		header('Location: index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Add publisher</title>
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
        </ul>
        <h3 class="text-muted">Store publisher</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add publisher</h2>
		 <form role="form" method="post" action="add_publication.php">
		 	<div class="form-group">
				<label>author_id</label>
				<input name="author_id" type="number" class="form-control" placeholder="Enter Author id">
			</div>
		    <div class="form-group">
				<label>publication_id</label>
				<input name="publication_id" type="number" class="form-control" placeholder="Enter publication id">
			</div>
		 
			<div class="form-group">
				<label>Title</label>
				<input name="title" type="text" class="form-control" placeholder="Enter the title of your publication">
			</div>
			<div class="form-group">
				<label>publisher</label>
				<input name="publisher" type="text" class="form-control" placeholder="Enter publisher Name">
			</div>
			
			<div class="form-group">
				<label>year</label>
				<input name="year" type="number" class="form-control" placeholder="Enter published year">
			</div>
			<div class="form-group">
				<label>paper_location</label>
				<input name="location" type="text" class="form-control" placeholder="Enter location">
			</div>
			<div class="form-group">
				<label>file_name</label>
				<input name="file_name" type="text" class="form-control" placeholder="Enter File name">
			</div>
			
			
			
			
			<input type="submit" class="btn btn-default" value="Add publisher" />
		</form>
        </div>
      </div>

      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>



<?php include 'footer.php'; ?>