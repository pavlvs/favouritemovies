<?php

// Called in main.inc.php

function showMovies($data) {
	global $db, $userID, $movieID, $testFav;

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

	case 'admin':
		$stmt = $db->prepare("SELECT  * FROM  `movies`");
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
			$output .= "\t\t\t\t<li id='fav_$id'>";
			$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>$title</a>";
			$output .= "</li>\n";
			break;

		case 'non_favs':
			if (file_exists("images-movies/$id-tn.png")) {
				$image = "images-movies/$id-tn.png";
			} else {
				$image = "images-movies/generic-tn.png";
			}

			$output .= "\t\t\t\t<li id='nonfav_$id'>\n";
			$output .= "\t\t\t\t\t<figure>\n";
			$output .= "\t\t\t\t\t\t<a href='index.php?user_id=$userID&amp;movie_id=$id'>";
			$output .= "<img src='$image' alt='$title' class='thumbnail'>";
			$output .= "</a>\n";
			$output .= "\t\t\t\t\t\t<figcaption>\n";
			$output .= "\t\t\t\t\t\t\t<h3>";
			$output .= "<a href='index.php?user_id=$userID&amp;movie_id=$id'>$title</a>";
			$output .= "</h3>\n";
			$output .= "\t\t\t\t\t\t\t<div class='description'>$description</div>\n";
			$output .= "\t\t\t\t\t\t\t<div class='add'></div>\n";
			$output .= "\t\t\t\t\t\t</figcaption>\n";
			$output .= "\t\t\t\t\t</figure>\n";
			$output .= "\t\t\t\t</li>\n\n";
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
			$output .= "<p>$testFav</p>";
			$output .= "</div>";
			$output .= "</div>";
			$output .= "<p class='description'>$description</p>";
			break;

		case 'admin':
			$output .= "<tr class='datarow'>";
			$output .= "<td><input class='data' type='text' name='title' value='$title'></td>";
			$output .= "<td><input class='data description' type='text' name='description' value='$description'></td>";
			$output .= "<td class='deletecell'><div class='delete'></div></td>";
			$output .= "</tr>";
		}
	}
	$stmt->close();
	return $output;
}
?>