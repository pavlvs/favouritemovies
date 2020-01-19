$(document).ready(function() { // Adds a single movie to the favourites list
    $requestRunning = false;
    $(document).on('click', '.actions .add', function() {
        if ($requestRunning) {
            return; //Don't do anything if an AJAX request is running
        }

        $this = $(this);
        $id = $('h3').attr('id');
        $description = $('p.description').text();
        $title = $('h3').text();

        $.ajax({
            url: 'ajax/add-favs.ajax.php',
            type: 'POST',
            data: {
                'movie_id': $id,
                'user_id': $userID
            }, // End data

            'beforeSend': function() {
                $requestRunning = true;
                $('.loader_large').removeClass('hidden');
                $('html').not('.loader_large').addClass('dim');
            }, // End beforesend

            'success': function() {
                $requestRunning = false;

                $description = $description.replace(/'/g, '&apos;');
                $title = $title.replace(/'/g, '&apos;');

                $('.add_remove.add p').text('Remove from favourites');
                $output = '<li title=' + $description + ' id="fav_' + $id + '">';
                $output += '<a href="index.php?user_id=';
                $output += $userID;
                $output += '&amp;movie_id=' + $id + '">';
                $output += $title;
                $output += '</a></li>';

                $('ul.favs').append($output);
                $('ul.favs li#fav_' + $id).draggable({
                    helper: 'clone'
                });

                $this_added = $('li#fav_' + $id);
                $this_added.addClass('highlight');

                $('.favs li').mouseover(function() {
                    $('.highlight').removeClass('highlight');
                });

                $this.html('<p>Remove from favourites</p>')
                    .removeClass('add')
                    .addClass('remove');

                $favsLength = $('.favs li').length;
                $nonFavsLength = $('.non_favs li').length;

                if ($favsLength < 1) {
                    $('.favs_list h2').text('You have no favourites');
                    $('.trash').addClass('hidden');
                } else {
                    $('.favs_list h2').text('Favourites');
                    $('.trash').removeClass('hidden');

                }
                $('.loader_large').addClass('hidden');
                $('html').not('.loader_large').removeClass('dim');
            } // End success

        }); // End Ajax call

    }); // End .non_favs .add click function
}); // End document ready