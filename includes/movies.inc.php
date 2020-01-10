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

?>

<nav class="favs_list">
    <h2>Favourites</h2>
    <ul class="favs">
        <?php echo $favsList; ?>
    </ul>
    <div class="trash"></div>
</nav>

<?php
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