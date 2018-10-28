<?php

if (!defined('ABSPATH')) {
    exit;
}

?>
<div class="boom-sorting">
    <form class="woocommerce-per-page" method="post">
        <p>Показать:</p>
        <?
        $limits = [8, 16, 24];
        foreach ($limits as $limit): ?>
            <input type="radio" name="perpage" class="orderby"
                   id="perpage-<?= $limit ?>" value="<?= $limit ?>" <? checked($_SESSION['perpage'], $limit); ?>>
            <label for="perpage-<?= $limit ?>"><?= $limit ?></label>
        <? endforeach; ?>
    </form>
    <form class="woocommerce-ordering" method="get">
        <p>Сортировать:</p>

        <?
        $catalog_orderby_options['popularity'] = 'популярные<i class="fa fa-sort"></i>';
        $catalog_orderby_options['date'] = 'новинки<i class="fa fa-sort"></i>';
        $catalog_orderby_options['price'] = 'по цене товара<i class="fa fa-sort-up"></i>';
        $catalog_orderby_options['price-desc'] = 'по цене товара <i class="fa fa-sort-down"></i>';
        unset($catalog_orderby_options['rating']);
        // unset($catalog_orderby_options['price-desc']);

        if ($orderby == 'price') {
            unset($catalog_orderby_options['price']);
        } else {
            unset($catalog_orderby_options['price-desc']);
        }

        $priceActive = $orderby == 'price' || $orderby == 'price-desc' ? 'active' : '';

        foreach ($catalog_orderby_options as $id => $name) :
            $id = esc_attr($id);
            ?>
            <input type="radio" name="orderby"
                   class="orderby <?= $id == 'price' || $id == 'price-desc'?$priceActive:'' ?>" id="sort-<?= $id ?>"
                   value="<?= $id ?>" <? checked($orderby, $id); ?>>
            <label for="sort-<?= $id ?>"><?= $name ?></label>
        <?php endforeach; ?>
        <input type="hidden" name="paged" value="1"/>
        <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
    </form>
</div>