<?php include ('header.php'); ?>
<?php include('database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT 
			 publication.publication_id,
			 publication.title,
			 publication.publisher,
			 publication.year,
			 paper.location
			 FROM publication natural join paper
			 ORDER BY publication_id ASC";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  publication</title>
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
          <li><a href="add_publication.php">Add publisher</a></li>
        </ul>
        <h3 class="text-muted">CSE JOURNAL</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
		<?php if(isset($_GET['msg'])){
			echo '<div class="msg">'.$_GET['msg'].'</div>';
		}
		?>
         <h2 align="center">publisher</h2>
		 <table class="table table-striped" border="2">
			<tr>
				<th>publication ID</th>
				<th>Title </th>
				<th>publisher</th>
				<th>Year</th>
				
			</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
					$output ='<tr>';
					$output .='<td>'.$row['publication_id'].'</td>';
					$output .='<td>'.'<a href="read_pdf.php?local='.$row['location'].'">'.$row['title'].'</a>'.'</td>';
					$output .='<td>'.$row['publisher'].'</td>';
					$output .='<td>'.$row['year'].'</td>';
					//$output .='<td><a href="edit_customer.php?id='.$row['id'].'" class="btn btn-default btn-sm">Edit</a></td>';
					$output .='</tr>';
					
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no result were found";
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