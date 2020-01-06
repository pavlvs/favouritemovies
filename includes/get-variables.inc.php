<?php
if (isset($_GET['movie_id'])) {
	$movieID = $_GET['movie_id'];
}
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = "error";
}
?>