$(document).ready(function() {

    $('.favs li').draggable({
        helper: 'clone',
        drag: function() {
            $('.trash').addClass('trash_hover');
        } // End drag function
    }); // End draggable

    $('.trash').droppable({
        accept: '.favs li',
        drop: function(event, ui) {
            $id = $(ui.draggable).attr('id').split('_');
            $id = $id[1];
            $this = $(ui.draggable);
            $title = $(ui.draggable).text();

            // AJAX HERE
            $.ajax({
                url: 'ajax/remove-favs.ajax.php',
                type: 'POST',
                data: {
                    'movie_id': $id,
                    'user_id': $userID
                }, // End data
                'beforesend': function() {
                    $this.remove();
                }, // End beforeSend
                'success': function() {
                    $('ul.non_favs').append('<li class=\'movie_list\' id=\'movie_' + $id + '\'>' + $title + '</li>');
                } // End success
            }); // End Ajax

        } // End drop function
    }); // End droppable

}); // End document ready