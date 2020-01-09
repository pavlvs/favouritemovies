<?php

// Called in nav.inc.php, movie-list.inc.php

function showUsers($data) {
	global $db, $userID;

	switch ($data) {
	case "all":
		$stmt = $db->prepare("SELECT * FROM `movie_goers` ORDER BY `firstname`");
		$tag = "li";
		break;

	case "current":
		$stmt = $db->prepare("SELECT * FROM `movie_goers` WHERE `user_id` = ?");
		$stmt->bind_param('i', $userID);
		$tag = "h2";
		break;

	case "others":
		$stmt = $db->prepare("SELECT * FROM `movie_goers` WHERE `user_id` != ? ORDER BY `firstname`");
		$stmt->bind_param('i', $userID);
		$tag = "li";
		break;

	case "get_name":
		$stmt = $db->prepare("SELECT * FROM `movie_goers` WHERE `user_id` = ?");
		$stmt->bind_param('i', $userID);
		$tag = "h2";
		break;
	}

	$stmt->bind_result($id, $firstname, $lastname);
	$stmt->execute();

	if ($tag == 'li') {
		$output = "<ul class='users_menu'>";
	} else {
		$output = "";
	}

	while ($stmt->fetch()) {
		$firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8");
		$lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8");

		if ($data == 'get_name') {
			$output .= "<$tag>";
			$output .= "Hi, $firstname $lastname";
			$output .= "</$tag>";
		} else {
			$output .= "<$tag>";
			$output .= "<a href='index.php?user_id=$id'>$firstname $lastname</a>";
			$output .= "</$tag>";
		}
		//echo $output;
	}

	if ($data == 'others') {
		$output .= "<$tag class='logout'>";
		$output .= "<a href='index.php'>Log Out</a>";
		$output .= "</$tag>";
	}
	if ($tag == 'li') {
		$output .= "<ul>";
	}
	$stmt->close();
	return $output;
}
?>