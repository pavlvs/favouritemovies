<?php $usersList = showUsers();?>

<nav class="navigation">
    <div class="select_users">
        <h2><a href="#">Logged-in user's name</a></h2>
    </div>
    <div class="profile logged_out"></div>
    <div class="admin_button"></div>

<?php echo $usersList; ?>

    <ul class="admin_menu">
        <li><a href="admin.php?page=users">Manage users</a></li>
        <li><a href="admin.php?page=movies">Manage movies</a></li>
    </ul>
</nav>