<?php
echo "I have been summoned";
require_once '../includes/connect.inc.php';

$userID = $_POST['user_id'];
$movieID = $_POST['movie_id'];

$stmt = $db->prepare("DELETE FROM  favourites WHERE movie_id = ? AND user_id = ?");
$stmt->bind_param('ii', $movieID, $userID);
$stmt->execute();
$stmt->close();
?>