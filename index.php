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
require_once 'favs.inc.php';

if (isset($movieID)) {
	require_once 'includes/single-movie.inc.php';
} else {
	require_once 'includes/movie-list.inc.php';
}

require_once 'includes/footer.inc.php';
?>