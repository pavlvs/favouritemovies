<?php
echo "I have been summoned";
require_once '../includes/connect.inc.php';

$id = $_POST['id'];

$stmt = $db->prepare("DELETE FROM  movies WHERE movie_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

$stmt = $db->prepare("DELETE FROM  favourites WHERE movie_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

?>