$(document).ready(function() {
    $requestRunning = false;
    $(document).on('click', '.non_favs .add', function() {
        if ($requestRunning) {
            return; //Don't do anything if an AJAX request is running
        }

        $id = ($(this).attr('id').split('_'));
        $id = $id[1];
        $title = $(this).text();
        $this = $(this);


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
                $this.remove();
            }, // End beforesend
            'success': function() {
                $requestRunning = false;
                $('ul.favs').append('<li class="movie_list" id="movie_' + $id + '">' + $title + '</li>');
                $('ul.favs li#movie_' + $id).draggable({
                    helper: 'clone'
                });
            } // End success
        }); // End Ajax
    }); // End movie_list click function
}); // End document ready