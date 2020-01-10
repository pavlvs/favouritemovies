<?php

// Called in movies.inc.php

function testMovies() {
	global $db, $movieID;

	if (!isset($movieID)) {
		return "no_id";
	}

	if (!is_numeric($movieID)) {
		return "invalid_id";
	}

	$stmt = $db->prepare("SELECT * FROM `movies` WHERE `movie_id` = ?");
	$stmt->bind_param('i', $movieID);
	$stmt->execute();
	$stmt->store_result();
	$numrows = $stmt->num_rows;
	$stmt->close();

	if ($numrows < 1) {
		return "invalid_id";
	} else {
		return "id_set";
	}
}
?>