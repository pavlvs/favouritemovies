<?php

set_include_path('./includes' . PATH_SEPARATOR . './functions');

// Functions
require_once 'test-users.fn.php';
require_once 'show-users.fn.php';

// Includes
require_once 'connect.inc.php';
require_once 'get-variables.inc.php';
require_once 'head.inc.php';
require_once 'header.inc.php';
require_once 'nav.inc.php';

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