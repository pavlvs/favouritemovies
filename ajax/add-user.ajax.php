<?php
echo "I have been summoned";
require_once '../includes/connect.inc.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$stmt = $db->prepare("INSERT INTO movie_goers (firstname, lastname) VALUES (?, ?)");
$stmt->bind_param('ss', $firstname, $lastname);
$stmt->execute();
$stmt->close();

?>