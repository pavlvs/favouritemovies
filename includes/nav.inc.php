<?php
$testUsers = testUsers();
switch ($testUsers) {
case 'no_data':
	$heading = "<h2><a href='index.php?page=users'>Add movie-goers</a></h2>";
	$usersList = "";
	$loggedState = "logged_out";
	break;

case 'no_id':
	$usersList = showUsers('all');
	$heading = "<h2><a>Choose a movie-goer</a></h2>";
	$loggedState = "logged_out";
	break;

case 'invalid_id':
	$usersList = showUsers('all');
	$heading = "<h2><a>Choose a movie-goer</a></h2>";
	$loggedState = "logged_out";
	break;

case 'id_set':
	$usersList = showUsers('others');
	$heading = showUsers('current');
	$loggedState = "logged_in";
	break;
}
?>

<nav class="navigation">
    <div class="select_users">
        <?php echo $heading; ?>
    </div>
    <div class="profile <?php echo $loggedState; ?>"></div>
    <div class="admin_button"></div>

<?php echo $usersList; ?>

    <ul class="admin_menu">
        <li><a href="index.php?page=users">Manage users</a></li>
        <li><a href="index.php?page=movies">Manage movies</a></li>
    </ul>
</nav>

<?php
if ($page == 'users') {
	include 'admin-users.inc.php';
	include 'footer.inc.php';
	exit;
}

if ($page == 'movies') {
	include 'admin-movies.inc.php';
	include 'footer.inc.php';
	exit;
}

if ($testUsers == 'no_id') {
	echo "<div class='message'>";
	echo "<h2>Choose one of the movie-goers from the menu on the right</h2>";
	echo "</div>";
	include 'footer.inc.php';
	exit;
}

if ($testUsers == 'invalid_id') {
	echo "<div class='message alert'>";
	echo "<h2>Invalid user ID: Choose one of the movie-goers from the menu on the right</h2>";
	echo "</div>";
	include 'footer.inc.php';
	exit;
}

if ($testUsers == 'no_data') {
	echo "<div class='message alert'>";
	echo "<h2>No movie-goers in database: Add movie-goers below</h2>";
	echo "</div>";
	include 'admin-users.inc.php';
	include 'footer.inc.php';
	exit;
}
?>