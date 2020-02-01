<?php include('database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT 
			 teacher.first_name,
			 teacher.last_name,
			 paper.location
			 FROM teacher  join author  join publication_author join publication  join paper
			 where teacher.id=author.author_id and author.author_id=publication_author.author_id and publication_author.publication_id=publication.publication_id and publication.publication_id=paper.publication_id and teacher.id<4
			 ORDER BY teacher.id ASC";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
<head>
<title>CSE Research Journal University of Chittagong</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

<style>

a:hover {
  color:white;
}

</style>
</head>
<body>


<div class="logoimage" id="topclass">
<img src="A html resources\Webp.net-resizeimage (4).png">
</div>
<h1 class="logo" >
		<a href="index.php">CSE Research Journal<br>University of Chittagong</a>
</h1>

<div class ="navbar">
<ul >
<li><a href="#his">Home</a></li>
<li><a href="teacher.php">Teacher</a></li>
<li><a href="student.php">Student</a></li>
<li><a href="publication.php">Publication</a></li>
</ul>
</div>

<div class="intro">
<p >Welcome to the campus of glory...<br>
 University of Chittagong is a public research university with
 multidisciplinary<br> 
 faculties.It has about 24,000 students and more than 1000 faculty members.
</p>
</div>

<div class="block">
	<h4>CSE CU</h4>
		<p>
	CSE(computer science and engineering) is one of the best department of university of chittagong.It has started it's journey since 2000. This several years it has almost every year published some glorious research paper on IT field some world class journal like <b><a href="https://bit.ly/2R5XMzy">IEEE</a></b>.
        </p>
</div>

<div class="block">
	<h4>Research</h4>
	<p >
	Research is "creative and systematic work undertaken to increase the stock of knowledge, including knowledge of humans, culture and society, and the use of this stock of knowledge to devise new applications." It is used to establish or confirm facts, reaffirm the results of previous work, solve new or existing problems, support theorems, or develop new theories.</p>
</div>

<div class="block">
	<h4>Top Researcher(based on published paper)</h4>
	<p>
	<ul>
		<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){


					
					//Display customer info
					$output ='<li>';
					$output .='<td>'.'<a href="read_pdf.php?local='.$row['location'].'">'.$row['first_name'].' '.$row['last_name'].'</a>'.'</td>';
					$output .='</li>';
					
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no results were found";
			}
			?>
	</ul></p>
</div>

<div class="nobelimage">

</div>



<div class="details" id="journal">
	
<h4>CSE Research Journal University of Chittagong</h4>
<p style="font-family:  Arial,bold">
	
 All the faculties publish a research journal of the common title The Chittagong University Studies (now renamed Chittagong University Journal) distinguished by the name of the individual faculty suffixed to it. The Chittagong University Journal of Science, The Chittagong University Journal of Arts and Humanities, The Chittagong University Journal of Social Science, The Chittagong University Journal of Business Administration and The Chittagong University Journal of Law come out once or twice a year.<br><br>


All of our internal faculties of the university brings out separate research journal annually which publishes standard research or creative articles based on favourable recommendations of at least two experts for each paper nominated by the editorial board of the concerned journal. There is a publication cell consisting of senior faculty members which can recommend the publication of standard textbooks or higher degree research dissertations. The university allocates fund to the Research Centre, Nazrul Research Centre and Bureau of Business Research to initiate small research projects to be done by the teachers. Over the years, the faculty members of this university have earned reputation by publishing a lot of research papers in the national and international journals. Some of them have also completed a large number of research monographs in their respective branches of knowledge and possess, to their credit, invaluable experiences of working as national experts.



</p>

</div>

<a class="topclass" href="#top">Go to top </a>

</body>
</html>
