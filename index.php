<?php

// Functions
require_once 'functions/show-users.fn.php';

// Includes
require_once 'includes/connect.inc.php';
require_once 'includes/get-variables.inc.php';
require_once 'includes/head.inc.php';
require_once 'includes/header.inc.php';
require_once 'includes/nav.inc.php';
require_once 'includes/favs.inc.php';

if (isset($movieID)) {
	require_once 'includes/single-movie.inc.php';
} else {
	require_once 'includes/movie-list.inc.php';
}

require_once 'includes/footer.inc.php';
?>