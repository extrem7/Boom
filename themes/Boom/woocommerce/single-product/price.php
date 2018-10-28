<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>

<div class="prices">
    <?
    $price = $product->get_price();
    $wholesale = $product->get_meta('wholesale');
    $wholesaleBig = $product->get_meta('wholesale_big');
    $counts = get_field('опт', 'option');
    if ($wholesaleBig):
        ?>
        <div class="price">
            <div class="block">Крупный опт. : <span> <?= $wholesaleBig ?></span> руб.</div>
            <p class="condition">при сумме заказа
                от<br><b><?= wc_price($price * $counts['единиц_для_крупного_опта']) ?></b></p>
        </div>
    <?
    endif;
    if ($wholesale): ?>
        <div class="price">
            <div class="block">Оптом : <span> <?= $wholesale ?></span> руб.</div>
            <p class="condition">при сумме заказа
                от<br><b><?= wc_price($price * $counts['единиц_для_опта']) ?></b></p>
        </div>
    <?endif;
    if ($price):?>
        <div class="price">
            <div class="block">В розницу : <span> <?= $price ?></span> руб.</div>
            <!-- <p class="condition">не менее<br><b>5 000 руб.</b></p>-->
        </div>
    <? endif; ?>
</div>