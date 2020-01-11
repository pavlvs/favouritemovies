<?php
$favsList = showMovies('favs');
$nonFavsList = showMovies('non_favs');
$testMovies = testMovies();
$testFav = testFav();

if ($favsList == "") {
	$favsTitle = "You have no favourites";
	$trashClass = "hidden";
} else {
	$favsTitle = "Favourites";
	$trashClass = "";
}

if ($nonFavsList == "") {
	$welcomeMessage = "You seem to like all the movies. Drag them to the trashcan to delete them from your favourites.";
	$ulOpeningTag = "";
	$ulClosingTag = "";
	$welcomeClass = "no_bottom_border";
} else {
	$welcomeMessage = "Here are some movies you might like. Click on the heart icon to add them to your favourites list.";
	$ulOpeningTag = "<ul class='non_favs>";
	$ulClosingTag = "</ul>";
	$welcomeClass = "";
}

switch ($testMovies) {
case 'no_movies':
	echo "<div class='message alert'>";
	echo "<h2>No movies in the database: Add movies below</h2>";
	echo "</div>";
	include 'admin-movies.inc.php';
	include 'footer.inc.php';
	exit;

case 'invalid_id':
	echo "<div class='message alert'>";
	echo "<h2 class=''>Invalid movie ID: Choose a movie-goer from the menu on the right</h2>";
	echo "</div>";
	include 'footer.inc.php';
	exit;
	break;
}

echo "<nav class='favs_list'>";
echo "<h2>$favsTitle</h2>";
echo "<ul class='favs'>";
echo $favsList;
echo "</ul>";
echo "<div class='trash $trashClass'></div>";
echo "</nav>";

switch ($testMovies) {
case 'no_id':
	echo "<section class='movie_list'>";
	$greeting = showUsers('get_name');
	echo $greeting;
	echo "<p class='welcome $welcomeClass'>$welcomeMessage</p>";
	echo $ulOpeningTag;
	echo $nonFavsList;
	echo $ulClosingTag;
	echo "</section>";
	break;

case 'id_set':
	echo "<section class='movie_single'>";
	$singleMovie = showMovies('single');
	echo $singleMovie;
	echo "</section>";
	break;
}
?>