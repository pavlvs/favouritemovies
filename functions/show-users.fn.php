<?php

// Called in nav.inc.php

function showUsers() {
	global $db;
	$stmt = $db->prepare("SELECT * FROM `movie_goers` ORDER BY `firstname`");
	$stmt->bind_result($id, $firstname, $lastname);
	$stmt->execute();
	$output = "<ul class='users_menu'>";
	while ($stmt->fetch()) {
		$firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8");
		$lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8");
		$output .= "<li><a href='index.php?user_id=$id'>$firstname $lastname</a></li>";
	}
	$output .= "</ul>";
	$stmt->close();
	return $output;
}
?>