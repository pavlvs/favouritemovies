<?php

// Called in favs.inc.php, single-movie.inc.php & movie-list.inc.php

function showMovies($data) {
	global $db, $userID, $movieID;

	switch ($data) {
	case "favs":
		$stmt = $db->prepare("SELECT * FROM `movies`
			WHERE `movie_id` IN (
				SELECT `movie_id` FROM `favourites`
					WHERE `favourites`.`user_id` = ?
			)
		ORDER BY `title`");
		$stmt->bind_param('i', $userID);
		break;

	case "non_favs":
		$stmt = $db->prepare("SELECT * FROM `movies`
			WHERE `movie_id` NOT IN (
				SELECT `movie_id` FROM `favourites`
					WHERE `user_id` = ?
		)
		ORDER BY `title`");
		$stmt->bind_param('i', $userID);
		break;

	case "single":
		$stmt = $db->prepare("SELECT * FROM `movies`
			WHERE `movie_id` = ?");
		$stmt->bind_param('i', $movieID);
		break;
	}

	$stmt->bind_result($id, $title, $description);
	$stmt->execute();

	$output = "";

	while ($stmt->fetch()) {
		$title = htmlentities($title, ENT_QUOTES, "UTF-8");
		$description = htmlentities($description, ENT_QUOTES, "UTF-8");

		switch ($data) {
		case 'favs':
			$output .= "<li>";
			$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>$title</a>";
			$output .= "</li>";
			break;

		case 'non_favs':
			if (file_exists("images-movies/$id-tn.png")) {
				$image = "images-movies/$id-tn.png";
			} else {
				$image = "images-movies/generic-tn.png";
			}

			$output .= "<li>";
			$output .= "<figure>";
			$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>";
			$output .= "<img src='$image' alt='$title' class='thumbnail'>";
			$output .= "</a>";
			$output .= "<figcaption>";
			$output .= "<h3>";
			$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>$title</a>";
			$output .= "</h3>";
			$output .= "<div class='description'>$description</div>";
			$output .= "<div class='add_remove favourite'></div>";
			$output .= "</figcaption>";
			$output .= "</figure>";
			$output .= "</li>";
			break;

		case 'single':
			if (file_exists("images-movies/$id-tn.png")) {
				$image = "images-movies/$id.png";
			} else {
				$image = "images-movies/generic.png";
			}

			$output .= "<img src='$image' alt='$title' class='movie_player'>";
			$output .= "<h3>$title</h3>";
			$output .= "<div class='actions'>";
			$output .= "<div class='add_remove'>";
			$output .= "<p>Add to/remove from favourites</p>";
			$output .= "</div>";
			$output .= "</div>";
			$output .= "<p class='description'>$description</p>";
			break;
		}
	}
	$stmt->close();
	return $output;
}
?>