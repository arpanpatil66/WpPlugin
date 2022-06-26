
<?php

if(isset($_FILES['imgfile'])){

    global $wpdb,$table_prefix;
    $table_name=$table_prefix.'wpimages';
    
    $target_dir_array=wp_upload_dir();
    $target_dir=$target_dir_array['path'];
    $target_url=$target_dir_array['url'];

    $imgname=$_POST['imagname'];
    $target_file=$target_dir.basename($_FILES['imgfile']['name']);
    $target_url=$target_url.basename($_FILES['imgfile']['name']);

    $shortcode='[wpimage_shortcode img="'.$target_url.'"]';

    if(move_uploaded_file($_FILES['imgfile']['tmp_name'],$target_file)){
        
        $q="INSERT INTO `$table_name` (`id`, `imagename`, `imgpath`, `shortcode`) VALUES (NULL,'$imgname','$target_url', '$shortcode');";
        $wpdb->query($q);

        echo '<div id="message" class="updated notice is-dismissible"><p>Image Upload Sucessfully.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';

    }else{
        echo '<div id="message" >Error!</div>';
    }
}


?>
<div class="wrap">
    <h1>Upload Image</h1>
    <form method="POST" enctype="multipart/form-data">
    <input type="hidden"  name='page' value='Wp_Imades_Slug'/>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="default_category">Enter Image Name :</label></th>
                <td>
                    <input id="post-search-input" name="imagname" required>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="default_category">Enter Image Name :</label></th>
                <td>
                    <input id="post-search-input" name="imgfile" type='file' required>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="page-title-action" type="submit" value='Upload Image'/>
                </td>
            </tr>
        </table>
    </form>
</div>