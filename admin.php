<?php
require_once 'includes/head.inc.php';
require_once 'includes/header.inc.php';
require_once 'includes/nav.inc.php';
?>
<!-- <nav class="favs_list">
    <h2>Favourites</h2>
    <ul class="favs">
        <li><a href="#">Movie Title</a></li>
        <li><a href="#">Movie Title</a></li>
        <li><a href="#">Movie Title</a></li>
    </ul>
</nav> -->
<section class="admin">
    <div class="admin_users">
        <h2>Manage users</h2>
        <table class="admin_table">
            <tr>
                <th class="data_col">Firstname</th>
                <th class="data_col">Lastname</th>
                <th class="admin_col">Delete</th>
            </tr>
            <tr class="data_row">
                <td><input class="data" type="text" name="firstname" value="Albert"></td>
                <td><input class="data" type="text" name="lastname" value="Smith"></td>
                <td class="deletecell">
                    <div class="delete"></div>
                </td>
            </tr>
            <tr class="data_row">
                <td><input class="data" type="text" name="firstname" value="Bob"></td>
                <td><input class="data" type="text" name="lastname" value="Miller"></td>
                <td class="deletecell">
                    <div class="delete"></div>
                </td>
            </tr>
            <tr class="data_row">
                <td><input class="data" type="text" name="firstname" value="Charles"></td>
                <td><input class="data" type="text" name="lastname" value="Mason"></td>
                <td class="deletecell">
                    <div class="delete"></div>
                </td>
            </tr>
            <tr class="data_row">
                <td><input class="data" type="text" name="firstname" value=""></td>
                <td><input class="data" type="text" name="lastname" value=""></td>
                <td class="insertcell">
                    <div class="insert"></div>
                </td>
            </tr>
        </table>
    </div>
</section>
<footer>
    <p>Instant update database project by <a href="mailto:pavlvsxavier@gmail.com">Pavlvs</a></p>
</footer>
</body>

</html>