<?php $dataRow = showMovies('admin');?>
        <section class="admin">
            <div class="admin_movies">
                <?php if (!isset($testMovies) || $testMovies != 'no_movies'): ?>
                    <h2>Manage movies</h2>
                <?php endif?>
                <table class="admin_table">
                    <tr>
                        <th class="data_col">Title</th>
                        <th class="data_col description">Description</th>
                        <th class="admin_col">Insert/Delete</th>
                    </tr>
<?php echo $dataRow; ?>
                    <tr class='datarow'>
                        <td><input class='data' type='text' name='title' value=''></td>
                        <td><input class='data' type='text' name='description' value=''></td>
                        <td class='insertcell'><div class='insert'></div></td>
                    </tr>

                </table>
            </div>
        </section>