<?php
function register_photos() {
     register_post_type( 'photos',
     array(
         'label'=>'Photos',
         'name'=>'Photos',
         'singular_name'=>'Photo',
         'public'=>true,
         'show_ui'=>true,
         'hierarchical'=>true,
         'has_archive'=>true,
         'menu_position' => 6,
         'supports'=>array('thumbnail','title') ) );
}

add_action ('init','register_photos');

// 2. Show Columns

add_filter ("manage_edit-photos_columns", "photos_edit_columns");
add_action ("manage_posts_custom_column", "photos_custom_columns");

function photos_edit_columns($columns) {

    $columns = array(
        "title" => "Title",
        "photo_thumb" => "Photo",
        );

    return $columns;

}

function photos_custom_columns($column) {

    global $post;
    $custom = get_post_custom();
    switch ($column)

        {
            case "photo_thumb":
                // - show thumb -
                $post_image_id = get_post_thumbnail_id(get_the_ID());
                echo 'BLAH';
                if ($post_image_id) {
                    $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
                    if ($thumbnail) (string)$thumbnail = $thumbnail[0];
                    echo '<img src="'.the_post_thumbnail( array(100,100) ).'" />';
                }
            break;
        }
}



?>