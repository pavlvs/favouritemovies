<?php

set_include_path('./includes' . PATH_SEPARATOR . './functions');

// Functions
require_once 'test-users.fn.php';
require_once 'show-users.fn.php';
require_once 'test-movies.fn.php';
require_once 'show-movies.fn.php';

// Includes
require_once 'connect.inc.php';
require_once 'get-variables.inc.php';
require_once 'head.inc.php';
require_once 'header.inc.php';
require_once 'nav.inc.php';
require_once 'movies.inc.php';

require_once 'includes/footer.inc.php';
?>