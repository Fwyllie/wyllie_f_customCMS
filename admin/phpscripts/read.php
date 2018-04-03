<?php

	function getAll($tbl, $col) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl} ORDER BY {$col} ASC";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "Houston, we have a problem acessing this information.";
			return $error;
		}
		mysqli_close($link);
	}

	function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
		include('connect.php');

		$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
		$runQuery = mysqli_query($link, $filterQuery);
		if($runQuery){
			return $runQuery;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}

	function reviewResults($id){
		include('connect.php');
		$revQuery = "SELECT * FROM tbl_movies, tbl_reviews, tbl_mov_rev WHERE tbl_movies.movies_id = tbl_mov_rev.movies_id AND tbl_reviews.reviews_id = tbl_mov_rev.reviews_id AND tbl_mov_rev.movies_id='{$id}'";
		// $revQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl}.{$col}='{$id}'";
		// $revQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$id}'";
		$runQuery = mysqli_query($link, $revQuery);
		if($runQuery){
			return $runQuery;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}
?>
