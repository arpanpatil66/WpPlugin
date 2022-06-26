
<?php

global $wpdb,$table_prefix;
$table_name=$table_prefix.'wpimages';

//featch database
$q="SELECT * FROM `$table_name`;";
$result= $wpdb->get_results($q);

?>

<div class="wrap">
<h1 class="wp-heading-inline">Imades List</h1>
<form style='display:inline;'>
    <input type="hidden"  name='page' value='Wp_Imades_add_Slug'/>
<input class="page-title-action" type="submit" value='Upload Image'/>
</form>
<table class="wp-list-table widefat fixed striped table-view-list posts">
	<thead>
        <tr>
            <th scope="col" id="author" class="manage-column column-author">Image Name</th>
            <th scope="col" id="author" class="manage-column column-author">Image Path</th>
            <th scope="col" id="author" class="manage-column column-author">ShortCode</th>
        </tr>
    </thead>
    <tbody id="the-list">
        <?php
        foreach($result as $row){
            echo '<tr>';
            echo "<td>`$row->imagename`</td>";
            echo "<td>`$row->imgpath`</td>";
            echo "<td>`$row->shortcode`</td>";
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

</div>