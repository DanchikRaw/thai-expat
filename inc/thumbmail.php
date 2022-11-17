<?php
function thai_expat_thumbmail($post, $class) {
$img = get_the_post_thumbnail($post, 'full', ['class' => $class]);
if($img) {
    return $img;
} else {
    return '<img src="' .get_template_directory_uri() . '/dist/images/no-image.svg" class="' . $class . '">';
}
}