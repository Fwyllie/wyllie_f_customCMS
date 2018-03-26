<?php
	require_once('admin/phpscripts/config.php');

	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = "romance";
		$getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
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
	include('includes/nav.html');

	if(!is_string($getMovies)){
		while($row = mysqli_fetch_array($getMovies)){
			echo "<a href=\"details.php?id={$row['movies_id']}\"><img class=\"movieCover\" src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\"></a>";
		}
	}else{
		echo "<p class=\"error\">{$getMovies}</p>";
	}

	include('includes/footer.html');
?>
</body>
</html>
