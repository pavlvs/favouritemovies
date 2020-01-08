<?php
require_once 'includes/connect.inc.php';
require_once 'includes/get-variables.inc.php';
require_once 'includes/head.inc.php';
require_once 'includes/header.inc.php';
require_once 'includes/nav.inc.php';

if ($page == 'users') {
	require_once 'includes/admin-users.inc.php';
} else {
	if ($page == 'movies') {
		require_once 'includes/admin-movies.inc.php';
	} else {
		echo "<h2 class='alert message'>Please use the admin menus to navigate</h2>\n";
		require_once 'includes/footer.inc.php';
		exit;
	}
}

require_once 'includes/footer.inc.php';
?>