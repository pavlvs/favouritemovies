<?php
$greeting = showUsers('get_name');
$nonFavsList = showMovies('non_favs');
?>

<section class="movie_list">
    <?php echo $greeting; ?>

    <p class="welcome">Here are some movies you might like. Click on the heart icon to add them to your favourites list.</p>
    <ul class="non_favs">
        <?php echo $nonFavsList; ?>
    </ul>

</section>