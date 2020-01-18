// Deletes movie-goers from the database
$(document).ready(function() {
    $(document).on('mouseover mouseout', '.deletecell', function() {
        $('.delete', this).toggleClass('hidden');
    });

    // DELETE USER ++++++++++++++++++++++++++
    $(document).on('click', '.admin_table .delete', function() {

        $this = $(this);
        $id = $this.closest('tr').attr('id').split('_');
        $id = $id[1];

        $.ajax({ // Begin delete ajax
            url: 'ajax/delete-user.ajax.php',
            type: 'POST',
            data: { // Begin data
                'id': $id
            }, // End data
            'beforeSend': function() {
                $this.removeClass('delete').addClass('loader_small');
            }, // End beforesend
            'success': function() {
                $('tr#user_' + $id).remove();
            } // End success
        }); // End delete ajax
    });
    // END DELETE USER ++++++++++++++++++++++++++

}); // End document ready