<?php


if (!defined('ABSPATH')) {
    exit;
}
global $post;
?>
<div class="products-list">
    <div class="title title-line">
        <div class="text">Похожие товары</div>
    </div>
    <ul class="products owl-carousel">
        <?
        $related_products = wc_get_related_products($post->ID, 8);
        foreach ($related_products as $id) {
            $post = get_post($id);
            wc_get_template_part('content', 'product');
        }
        wp_reset_postdata(); ?>
    </ul>
</div>
