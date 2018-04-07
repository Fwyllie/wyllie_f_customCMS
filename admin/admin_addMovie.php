<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('phpscripts/config.php');

	$tbl = "tbl_genre";
	$col = 'genre_name';
	$genQuery = getAll($tbl, $col);

	if(isset($_POST['submit'])){
		$cover = $_FILES['cover'];
		$title = $_POST['title'];
		$year = $_POST['year'];
		$duration =  $_POST['duration'];
		$desc = $_POST['desc'];
		$trailer = $_POST['trailer'];
		$genre = $_POST['genre'];
		$result = addMovie($cover, $title, $year, $duration, $desc, $trailer, $genre);
		$message =  $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix Admin Panel - Add Movie</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body id="add">
	<a class="homeButton" href="admin_index.php">Home</a>
	<div id="createDiv">
		<h1>Add a New Movie!</h1>
		<?php if(!empty($message)){ echo $message;} ?>
		<form  id="addForm" action="admin_addMovie.php" method="post" enctype="multipart/form-data">
			<label>Movie Poster:</label><br>
			<input type="file" name="cover">
			<br>
			<label>Movie Trailer:</label><br>
			<input type="file" name="trailer">
			<br>
			<label>Movie Title:</label><br>
			<input type="text" name="title" value="">
			<br>
			<label>Movie Year:</label><br>
			<input type="text" name="year" value="">
			<br>
			<label>Movie Duration:</label><br>
			<input type="text" name="duration" placeholder="105min">
			<br>
			<label>Movie Description:</label><br>
			<input type="text" name="desc" value="">
			<br>
			<select name="genre">
				<option>Select a genre</option>
				<?php
					while($row = mysqli_fetch_array($genQuery)){
						echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
					}
				?>
			</select><br>
			<input id="submitButton" type="submit" name="submit" value="Submit!">
		</form>
	</div>

</body>
</html>
