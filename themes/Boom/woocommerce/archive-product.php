<?php

defined('ABSPATH') || exit;

get_header('shop');

?>
    <div class="title text-center mb-4">
        <div class="text">Почему покупают в компании “БУМ”</div>
    </div>
    <div class="advantages row justify-content-between">
        <? get_template_part('views/about') ?>
    </div>
    <div class="products-list">
        <div class="title title-line">
            <div class="text">Новинки</div>
        </div>
        <ul class="products owl-carousel">
            <?
            $productQuery = $Boom->latestProducts(12);
            while ($productQuery->have_posts()) {
                $productQuery->the_post();
                wc_get_template_part('content', 'product');
                wp_reset_query();
            } ?>
        </ul>
    </div>
    <div class="products-list">
        <div class="title title-line">
            <div class="text">популярные</div>
        </div>
        <ul class="products owl-carousel">
            <?
            $productQuery = $Boom->popularProducts(12);
            while ($productQuery->have_posts()) {
                $productQuery->the_post();
                wc_get_template_part('content', 'product');
                wp_reset_query();
            } ?>
        </ul>
    </div>
    <div class="products-list">
        <div class="title title-line">
            <div class="text">распродажа</div>
        </div>
        <ul class="products owl-carousel">
            <?
            $productQuery = $Boom->saleProducts(12);
            while ($productQuery->have_posts()) {
                $productQuery->the_post();
                wc_get_template_part('content', 'product');
                wp_reset_query();
            } ?>
        </ul>
    </div>
    <div class="d-none d-lg-block">
        <? $Boom->clients() ?>
        <? $Boom->form() ?>
    </div>
<? get_footer('shop');
