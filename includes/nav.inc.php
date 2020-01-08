<?php
$stmt = $db->prepare("SELECT * FROM `movie_goers` ORDER BY `firstname`");
$stmt->bind_result($id, $firstname, $lastname);
$stmt->execute();
?>
<nav class="navigation">
    <div class="select_users">
        <h2><a href="#">Logged-in user's name</a></h2>
    </div>
    <div class="profile logged_out"></div>
    <div class="admin_button"></div>

    <?php

echo "<ul class='users_menu'>";
while ($stmt->fetch()) {
	$firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8");
	$lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8");
	echo "<li><a href='index.php?user_id=$id'>$firstname $lastname</a></li>";
}
echo "</ul>";
$stmt->close();
?>
    <ul class="admin_menu">
        <li><a href="admin.php?page=users">Manage users</a></li>
        <li><a href="admin.php?page=movies">Manage movies</a></li>
    </ul>
</nav>