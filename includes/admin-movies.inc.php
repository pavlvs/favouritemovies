<?php
$dataRow = showMovies('admin');
echo "\t\t<section class='admin'>\n";
echo "\t\t\t<div class='admin_movies'>\n";
if (!isset($testMovies) || $testMovies != 'no_movies') {
	echo "\t\t\t<h2>Manage movies</h2>\n";
}
echo "\t\t\t\t<table class='admin_table'>\n";
echo "\t\t\t\t\t<tr>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Title</th>\n";
echo "\t\t\t\t\t\t<th class='data_col description'>Description</th>\n";
echo "\t\t\t\t\t\t<th class='admin_col'>Insert/Delete</th>\n";
echo "\t\t\t\t\t</tr>\n\n";
echo $dataRow;
echo "\t\t\t\t\t<tr class='datarow'>\n";
echo "\t\t\t\t\t\t<td><input class='data' type='text' name='title' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='data' type='text' name='description' value=''></td>\n";
echo "\t\t\t\t\t\t<td class='insertcell'><div class='insert'></div></td>\n";
echo "\t\t\t\t\t</tr>\n";

echo "\t\t\t\t</table>\n";
echo "\t\t\t</div>\n";
echo "\t\t</section>\n\n";
?>