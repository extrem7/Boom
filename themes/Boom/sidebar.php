<? global $Boom, $post ?>
<aside class="sidebar col-lg-3 col-sm-5">
    <? if (get_page_template_slug() == 'pages/company.php'): ?>
        <nav class="catalog-menu company-menu">
            <ul>
                <li><a href="#about">
                        <div class="icon">
                            <? require_once "assets/img/company-1.svg" ?>
                        </div>
                        <span>О нас</span></a></li>
                <li><a href="#about-us">
                        <div class="icon">
                            <? require_once "assets/img/company-2.svg" ?>
                        </div>
                        <span>почему мы</span></a></li>
                <li><a href="#our-clients">
                        <div class="icon">
                            <? require_once "assets/img/company-3.svg" ?>
                        </div>
                        <span>Наши клиенты</span></a></li>
                <li><a href="#reviews">
                        <div class="icon">
                            <? require_once "assets/img/company-4.svg" ?>
                        </div>
                        <span>отзывы</span></a></li>
                <li><a href="#documents">
                        <div class="icon">
                            <? require_once "assets/img/company-5.svg" ?>
                        </div>
                        <span>документы и реквизиты</span></a></li>
            </ul>
        </nav>
    <? endif; ?>
    <? if (is_woocommerce()): ?>
        <nav class="catalog-menu">
            <ul>
                <?
                wp_list_categories([
                    'taxonomy' => 'product_cat',
                    'walker' => new Walker_Catalog(),
                    'title_li' => '']);
                ?>
            </ul>
        </nav>
    <? endif; ?>
    <? if (is_product() || is_shop()): ?>
        <div class="d-block d-lg-none mb-3">
            <? $Boom->clients() ?>
            <? $Boom->form() ?>
        </div>
    <? endif; ?>
    <?
    $menus = ['files' => 'файлы', 'links' => 'страницы'];
    foreach ($menus as $name => $option):
        ?>
        <ul class="<?= $name ?>">
            <?
            while (have_rows($option, 'option')):the_row();
                ?>
                <li>
                    <a href="<? the_sub_field('ссылка') ?>">
                        <? $icon = get_attached_file(get_sub_field('иконка')['id']); ?>
                        <div class="icon">
                            <? require $icon ?>
                        </div>
                        <span><? the_sub_field('название') ?></span></a></li>
            <? endwhile; ?>
        </ul>
    <? endforeach; ?>
    <div class="banners">
        <? dynamic_sidebar('left-sidebar') ?>
    </div>
</aside>