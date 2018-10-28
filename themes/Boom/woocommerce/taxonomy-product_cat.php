<?php

defined('ABSPATH') || exit;

get_header();

$category = get_queried_object();

?>
    <div class="title mb-3">
        <? $title = get_field('заголовок', $category); ?>
        <div class="text"><?= $title ? $title : single_cat_title() ?></div>
    </div>
    <p><?= $category->description ?></p>
<? woocommerce_catalog_ordering() ?>
    <ul class="products">
        <?
        while (have_posts()) {
            the_post();
            wc_get_template_part('content', 'product');
        }
        ?>
    </ul>
<? woocommerce_pagination() ?>
<? $Boom->clients() ?>
<? $Boom->form() ?>
<? get_footer();
