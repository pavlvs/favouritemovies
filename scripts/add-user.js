// Inserts a new moviegoer into the database

$(function() {

    $(document).on('focus', '.newdatarow', function() {
        $('.insert').removeClass('hidden');

    });

    $(document).on('click', '.insert', function() {
        $this = $(this);

        $firstname = $('input.newdata[name="firstname"]').val();
        $lastname = $('input.newdata[name="lastname"]').val();

        if ($firstname == '' && $lastname == '') {
            alert('Please enter at least one name');
            return;
        }

        $.ajax({
            url: 'ajax/add-user.ajax.php',
            type: 'POST',
            data: {
                'firstname': $firstname,
                'lastname': $lastname
            },
            'beforeSend': function() {
                $this.removeClass('insert').addClass('loader_small');
                $('.delete').removeClass('success').addClass('hidden');
            },
            'success': function() {
                $('input.newdata').val('');

                $output = '<tr class="datarow">';
                $output += '<td><input class="data" type="text" name="firstname" value="' + $firstname + '"></td>';
                $output += '<td><input class="data" type="text" name="lastname" value="' + $lastname + '"></td>';
                $output += '<td class="deletecell"><div class="delete hidden"></div></td>';
                $output += '</tr>';

                $('.admin_table tr:last').before($output);

                $output = '<li>';
                $output += '<a href="index.php">' + $firstname + ' ' + $lastname + '</a>';
                $output += '</li>';

                $('.users_menu').append($output);
                $('.users_menu li').tsort();

                $('.delete:last').removeClass('loader_class').addClass('success');
                $this.removeClass('loader_small').addClass('insert');

                $(document).on('mouseover', '.deletecell', function() {
                    $('.delete', this).removeClass('hidden success');

                });

            }
        }); // End Ajax block

    }); // End on click


}); // End document ready