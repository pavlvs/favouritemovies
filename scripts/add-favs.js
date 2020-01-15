$(document).ready(function() {

    $(document).on('mouseover mouseout', '.non_favs li', function() {
        $('.add', this).toggleClass('favourite');
        //foo
    });

    $requestRunning = false;
    $(document).on('click', '.non_favs .add', function() {
        if ($requestRunning) {
            return; //Don't do anything if an AJAX request is running
        }

        $this = $(this);
        $this_li = $this.closest('li');

        $id = $this_li.attr('id').split('_');
        $id = $id[1];
        $description = $this.siblings('.description').text();
        $title = $this.siblings('h3').text();

        // AJAX HERE
        $.ajax({
            url: 'ajax/add-favs.ajax.php',
            type: 'POST',
            data: {
                'movie_id': $id,
                'user_id': $userID
            }, // End data
            'beforeSend': function() {
                $requestRunning = true;
                $this_li.remove();
            }, // End beforesend
            'success': function() {
                $requestRunning = false;

                $output = '<li title="' + $description + '" id="fav_' + $id + '">';
                $output += '<a href="index.php?user_id=';
                $output += $userID;
                $output += '&amp;movie_id=' + $id + '">';
                $output += $title;
                $output += '</a></li>';

                $('ul.favs').append($output);
                $('ul.favs li#fav_' + $id).draggable({
                    helper: 'clone'
                });

                $favsLength = $('.favs li').length;
                $nonFavsLength = $('.non_favs li').length;

                if ($favsLength < 1) {
                    $('.favs_list h2').text('You have no favourites');
                    $('p.welcome').text('').addClass('like_none');
                } else {
                    $('.favs_list h2').text('Favourites');
                    if ($nonFavsLength < 1) {
                        $('p.welcome').text('').addClass('like_all no_bottom_border');
                    } else {
                        $('p.welcome').text('').addClass('like_some');
                    }
                    $('.trash').removeClass('hidden');
                }
            } // End success
        }); // End Ajax call
    }); // End .non_favs .add click function
}); // End document ready