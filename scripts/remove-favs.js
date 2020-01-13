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
            $this = $(ui.draggable);
            $id = $this.attr('id').split('_');
            $id = $id[1];
            $title = $this.text();
            $description = $this.attr('title');
            console.log($id);
            console.log($title);

            // AJAX HERE
            $.ajax({
                url: 'ajax/remove-favs.ajax.php',
                type: 'POST',
                data: {
                    'movie_id': $id,
                    'user_id': $userID
                }, // End data
                'beforeSend': function() {
                    console.log($userID);
                    $this.remove();
                    $('.trash').addClass('trash_hover');
                }, // End beforeSend
                'success': function() {
                    $output = '<li id="nofav_' + $id + '">';
                    $output += '<figure>';
                    $output += '<a href="index.php?user_id=' + $userID + '&amp;movie_id=' + $id + 'remove-favs.js">';
                    $output += '<img src="images-movies/' + $id + '-tn.png" alt="' + $title + '" onerror=this.src="images-movies/generic-tn.png" class="thumbnail">';
                    $output += '</a>';
                    $output += '<figcaption>';
                    $output += '<h3>';
                    $output += '<a href="index.php?user_id=' + $userID + '&amp;movie_id=' + $id + '">' + $title + '</a>';
                    $output += '</h3>';
                    $output += '<div class="description">' + $description + '</div>';
                    $output += '<div class="add"></div>';
                    $output += '</figcaption>';
                    $output += '</figure>';
                    $output += '</li>';

                    $('ul.non_favs').prepend($output);
                    $('.trash').removeClass('trash_hover');
                } // End success
            }); // End Ajax

        } // End drop function
    }); // End droppable

}); // End document ready