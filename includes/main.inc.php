<?php
$favsList = showMovies('favs');
$nonFavsList = showMovies('non_favs');
$testMovies = testMovies();
switch ($testMovies) {
case 'invalid_id':
	echo "<div class='message alert'>";
	echo "<h2 class=''>Invalid movie ID: Choose a movie-goer from the menu on the right</h2>";
	echo "</div>";
	include 'footer.inc.php';
	exit;
	break;

case 'no_id':
	$greeting = showUsers('get_name');
	break;

case 'id_set':
	$singleMovie = showMovies('single');
	break;
}

if ($testMovies == "no_movies") {
	echo "<div class='message alert'>";
	echo "<h2>No movies in the database: Add movies below</h2>";
	echo "</div>";
	include 'admin-movies.inc.php';
	include 'footer.inc.php';
	exit;
} else {
	echo "<nav class='favs_list'>";
	echo "<h2>Favourites</h2>";
	echo "<ul class='favs'>";
	echo $favsList;
	echo "</ul>";
	echo "<div class='trash'></div>";
	echo "</nav>";
}

if (!isset($movieID)) {
	// show movie list
	echo "<section class='movie_list'>";
	echo $greeting;

	echo "<p class='welcome'>Here are some movies you might like. Click on the heart icon to add them to your favourites list.</p>";
	echo "<ul class='non_favs'>";
	echo $nonFavsList;
	echo "</ul>";

	echo "</section>";
} else {
	// show a single movie
	echo "<section class='movie_list'>";
	echo $singleMovie;
	echo "</section>";
}

?>