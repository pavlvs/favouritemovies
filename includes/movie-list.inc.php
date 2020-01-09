<?php $nonFavsList = showMovies('non_favs');?>

<section class="movie_list">
    <h2>Hi, username</h2>

    <p class="welcome">Here are some movies you might like. Click on the heart icon to add them to your favourites list.</p>
    <ul class="non_favs">
        <?php echo $nonFavsList; ?>
    </ul>

</section>