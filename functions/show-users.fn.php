<?php

// Called in nav.inc.php, main.inc.php

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

	case 'admin':
		$stmt = $db->PREPARE("SELECT  * FROM `movie_goers`");
		$tag = "";
		break;
	}

	$stmt->bind_result($id, $firstname, $lastname);
	$stmt->execute();

	if ($tag == 'li') {
		$output = "\t\t\t<ul class='users_menu hidden'>\n";
	} else {
		$output = "";
	}

	while ($stmt->fetch()) {
		$firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8");
		$lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8");

		switch ($data) {
		case 'get_name':
			$output .= "\t\t\t<$tag>";
			$output .= "Hi, $firstname $lastname";
			$output .= "</$tag>\n";
			break;

		case 'all';case 'current';case 'others':
			$output .= "\t\t\t\t<$tag>";
			$output .= "<a href='index.php?user_id=$id'>$firstname $lastname</a>";
			$output .= "</$tag>\n";
			break;

		case 'admin':
			$output .= "\t\t\t\t\t<tr id='user_$id' class='datarow'>\n";
			$output .= "\t\t\t\t\t\t<td><input class='data' type='text' name='firstname' value='$firstname'></td>\n";
			$output .= "\t\t\t\t\t\t<td><input class='data' type='text' name='lastname' value='$lastname'></td>\n";
			$output .= "\t\t\t\t\t\t<td class='deletecell'><div class='delete hidden'></div></td>\n";
			$output .= "\t\t\t\t\t</tr>\n";
		}
		//echo $output;
	}

	if ($data == 'others') {
		$output .= "\t\t\t\t<$tag class='logout'>";
		$output .= "<a href='index.php'>Log Out</a>";
		$output .= "</$tag>\n";
	}
	if ($tag == 'li') {
		$output .= "\t\t\t</ul>\n";
	}
	$stmt->close();
	return $output;
}
?>