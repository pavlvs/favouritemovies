<?php
$favsList = showMovies('favs');
$nonFavsList = showMovies('non_favs');
$testMovies = testMovies();
$testFav = testFav();

$welcomeMessage = "Here are some movies you might like. ";
$welcomeMessage .= "Click on the heart icon to add them to your favourite list.";
$favsTitle = "Favourites";
$trashClass = "";
$openTag = "<ul class='non_favs'>";
$welcomeClass = "";

if ($favsList == "") {
	$welcomeMessage = "You haven't got any favourites yet! ";
	$welcomeMessage .= "Mouse over the movies and click on the heart icon to add them to the list on the left.";
	$favsTitle = "You have no favourites";
	$trashClass = "hidden";
}

if ($nonFavsList == "") {
	$welcomeMessage = "You seem to like all the movies. Drag them to the trashcan to delete them from your favourites.";
	$openTag = "<ul class='non_favs hidden'>";
	$welcomeClass = "no_bottom_border";
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

echo "\t\t<nav class='favs_list'>\n";
echo "\t\t\t<h2>$favsTitle</h2>\n\n";
echo "\t\t\t<ul class='favs'>\n";
echo $favsList;
echo "\t\t\t</ul>\n\n";
echo "\t\t\t<div class='trash $trashClass'></div>\n";
echo "\t\t</nav>\n\n";

switch ($testMovies) {
case 'no_id':
	echo "\t\t<section class='movie_list'>\n";
	$greeting = showUsers('get_name');
	echo $greeting;
	echo "\t\t\t<p class='welcome $welcomeClass'>$welcomeMessage</p>\n\n";
	echo "\t\t\t$openTag\n";
	echo $nonFavsList;
	echo "\t\t\t</ul>\n";
	echo "\t\t</section>\n";
	echo "\t\t<div class='loader_large hidden'></div>\n\n";
	break;

case 'id_set':
	echo "<section class='movie_single'>";
	$singleMovie = showMovies('single');
	echo $singleMovie;
	echo "</section>";
	echo "\t\t<div class='loader_large hidden'></div>\n\n";
	break;
}
?>