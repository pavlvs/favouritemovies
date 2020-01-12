<?php $dataRow = showUsers('admin');?>
        <section class="admin">
            <div class="admin_users">
                <?php if ($testUsers != 'no_data'): ?>
                    <h2>Manage users</h2>
                <?php endif?>
                <table class="admin_table">
                    <tr>
                        <th class="data_col">Firstname</th>
                        <th class="data_col">Lastname</th>
                        <th class="admin_col">Insert/Delete</th>
                    </tr>
                    <?php echo $dataRow; ?>
                    <tr class="newdatarow">
                        <td><input class="newdata" type="text" name="firstname" value=""></td>
                        <td><input class="newdata" type="text" name="lastname" value=""></td>
                        <td class="insertcell"><div class="insert"></div></td>
                    </tr>
                </table>
            </div>
        </section>