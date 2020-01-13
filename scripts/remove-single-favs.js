$(document).ready(function() { // Removes single movie from favourites list

    $(document).on('click', '.actions .remove', function() {
        if ($requestRunning) {
            return; //Don't do anything if an AJAX request is running
        }
        $this = $(this);
        $id = $('h3').attr('id');

        $.ajax({
            url: 'ajax/remove-favs.ajax.php',
            type: 'POST',
            data: {
                'movie_id': $id,
                'user_id': $userID
            }, // End data
            'beforeSend': function() {
                $requestRunning = true;
                $('.trash').addClass('trash_hover');
            }, // End beforeSend
            'success': function() {
                $requestRunning = false;
                $('.trash').removeClass('trash_hover');
                $this.html('<p>Add to favourites</p>')
                    .removeClass('remove')
                    .addClass('add');
                $('li#fav_' + $id).remove();
            } // End success
        }); // End Ajax
    }); // End click
}); // End document ready