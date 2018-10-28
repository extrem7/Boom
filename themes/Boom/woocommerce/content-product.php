<?php

defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$price = $product->get_price();
?>
<li <?php wc_product_class('product-card'); ?>>
    <a href="<? the_permalink() ?>">
        <? the_post_thumbnail('medium', ['class' => 'photo']) ?>
        <p class="title"><? the_title() ?></p>
        <p class="excerpt"><? the_excerpt() ?></p>
        <p class="price">Цена: <?= wc_price($price) ?></p>
    </a>
</li>
