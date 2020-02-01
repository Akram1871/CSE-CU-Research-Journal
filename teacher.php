<?php include 'header.php'; ?>
<?php include('database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT 
			 teacher.id,
			 teacher.first_name,
			 teacher.last_name,
			 teacher.designation,
			 teacher.email,
			 teacher.age,
			 teacher.phone,
			 paper.location
			 FROM teacher  join author  join publication_author join publication  join paper
			 where teacher.id=author.author_id and author.author_id=publication_author.author_id and publication_author.publication_id=publication.publication_id and publication.publication_id=paper.publication_id
			 ORDER BY teacher.id ASC";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  Teacher</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="add_teacher.php">Add Teacher</a></li>
        </ul>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
		<?php if(isset($_GET['msg'])){
			echo '<div class="msg">'.$_GET['msg'].'</div>';
		}
		?>
         <h2 align="center">Teachers</h2>
		 <table class="table table-striped" border="2">
			<tr>
				<th>ID</th>
				<th>Teacher Name</th>
				<th>Designation</th>
				<th>Email</th>
				<th>Age</th>
				<th>Phone</th>
				<th></th>
			</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){


					
					//Display customer info
					$output ='<tr>';
					$output .='<td>'.$row['id'].'</td>';
					$output .='<td>'.'<a href="read_pdf.php?local='.$row['location'].'">'.$row['first_name'].' '.$row['last_name'].'</a>'.'</td>';
					$output .='<td>'.$row['designation'].'</td>';
					$output .='<td>'.'<a href="https://mail.google.com/mail/u/0/#inbox?compose=new">'.$row['email'].'</a>'.'</td>';
					$output .='<td>'.$row['age'].'</td>';
					$output .='<td>'.$row['phone'].'</td>';
					//$output .='<td><a href="edit_customer.php?id='.$row['id'].'" class="btn btn-default btn-sm">Edit</a></td>';
					$output .='</tr>';
					
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no results were found";
			}
			?>
		</table>
        </div>

       
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>



<?php include 'footer.php'; ?>