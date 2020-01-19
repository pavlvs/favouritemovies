<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>var $movieID = "<?php echo $movieID; ?>"</script>
    <script src = "scripts/navigation.js"></script>
    <script src = "scripts/jquery.tinysort.min.js"></script>

<?php
if (isset($userID)) {
	?>
        <script>var $userID = "<?php echo $userID; ?>"</script>
    	<script src = "scripts/add-favs.js"></script>
    	<script src = "scripts/remove-favs.js"></script>

        <?php if (isset($movieID)) {?>
            <script src = "scripts/add-single-favs.js"></script>
            <script src = "scripts/remove-single-favs.js"></script>
        <?php }
}

if ($page == 'users') {?>
    <script src="scripts/delete-user.js"></script>
    <script src="scripts/add-user.js"></script>
<?php
}

if ($page == 'movies') {?>
    <script src="scripts/delete-movie.js"></script>
<?php
}?>

    <title>Instant Update Database Project</title>
</head>