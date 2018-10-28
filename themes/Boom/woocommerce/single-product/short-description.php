<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $post;

?>
<p class="description"><?= get_post_field('post_content', $id); ?></p>
