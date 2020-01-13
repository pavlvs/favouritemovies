<?php
// Called in main.inc.php
function testFav() {
	global $db, $userID, $movieID;

	$stmt = $db->prepare("SELECT  * FROM `favourites`
                        WHERE `movie_id`=?
                        AND `user_id`=?");
	$stmt->bind_param('ii', $movieID, $userID);
	$stmt->execute();
	$stmt->store_result();
	$numrows = $stmt->num_rows;

	if ($numrows == 0) {
		$output = "Add to favourites";
	} else {
		$output = "Remove from favourites";
	}

	$stmt->close();
	return $output;
}
