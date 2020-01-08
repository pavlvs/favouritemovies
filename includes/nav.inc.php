<?php
$testUsers = testUsers();
switch ($testUsers) {
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

default:
	# code...
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
        <li><a href="admin.php?page=users">Manage users</a></li>
        <li><a href="admin.php?page=movies">Manage movies</a></li>
    </ul>
</nav>