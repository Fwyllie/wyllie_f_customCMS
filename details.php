<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$review = $_POST['review'];
			$rating =  $_POST['rate'];
			$result = addRev($name, $review, $rating, $id);
			$message =  $result;
		}
		$tbl = "tbl_movies";
		$tbl2 = "tbl_reviews";
		$tbl3 = "tbl_mov_rev";
		$col = "movies_id";
		$col2 = "reviews_id";
		$getReviews = reviewResults($id);
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
<div class="details">
	<?php
		if(!is_string($getMovie)) {
			$row=mysqli_fetch_array($getMovie);
			echo "<a class=\"backButton\" href=\"index.php\">X</a>
			<div class=\"MovDetailsDiv\"><img class=\"detailsCov\" src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
			<h2>{$row['movies_title']}</h2>
			<p>Release: {$row['movies_year']}</p>
			<p>Duration: {$row['movies_duration']}</p>
			<p>{$row['movies_desc']}</p></div>
			";
		}else{
			echo "<p>{$getMovie}</p>";
		}
		?>
		<div id="addReviewDiv">
			<h2>Write a review</h2>
			<?php
				if(!empty($message)){
					echo $message;
				}
				echo "<form  id=\"addReviewForm\" action=\"details.php?id={$id}\" method=\"post\">
				<label>Your Name:</label><br>
				<input type=\"text\" maxlength=\"20\" name=\"name\">
				<br>
				<label>Rating out of 10:</label><br>
				<input type=\"text\" name=\"rate\" placeholder=\"8/10\">
				<br>
				<label>Review:</label><br>
				<textarea type=\"text\" name=\"review\" rows\"15\" cols=\"30\"></textarea>
				<br>
				<button id=\"submitButton\" type=\"submit\" name=\"submit\">Submit Review</button>
			</form>";?>
		</div>
		<div class="reviewsDiv">
			<h2>User Reviews!</h2>
			<?php
				while($row = mysqli_fetch_array($getReviews)){
					echo "<div class=\"singleReview\"><h3 class=\"revName\">{$row['reviews_name']}</h3><p class=\"revRating\">{$row['reviews_rating']}/10</p><p class=\"revReview\">{$row['reviews_review']}</p></div>";
				}
			 ?>
		</div>
</div>

<?php include('includes/footer.html'); ?>
</body>
</html>
