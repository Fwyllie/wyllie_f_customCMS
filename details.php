<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Franflix.</title>
<link rel="stylesheet" href="css/mainHome.css">
</head>
<body>

	<?php
		if(!is_string($getMovie)) {
			$row=mysqli_fetch_array($getMovie);
			echo "<a class=\"backButton\" href=\"index.php\">X</a>
			<div class=\"deatilsDiv\"><img class=\"detailsCov\" src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
			<h2>{$row['movies_title']}</h2>
			<p>Release: {$row['movies_year']}</p>
			<p>Duration: {$row['movies_duration']}</p>
			<p>{$row['movies_desc']}</p></div>
			";

		}else{
			echo "<p>{$getMovie}</p>";
		}
	include('includes/footer.html');
	?>

</body>
</html>
