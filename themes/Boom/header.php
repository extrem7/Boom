<? global $Boom ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= wp_get_document_title() ?></title>
        <? wp_head() ?>
    </head>
<body <? body_class() ?>>
    <header class="header">
        <div class="container">
            <div class="row align-items-end">
                <a href="<? bloginfo('url') ?>" class="logo text-center col-xl-5 col-lg-4">
                    <img <? the_image('лого', 'option') ?> class="img-fluid">
                </a>
                <div class="header-content col-xl-7 col-lg-8">
                    <div class="header-info d-flex align-items-center">
                        <p class="details"><? the_field('режим_работы', 'option') ?>
                            <br>E-mail: <? the_field('почта', 'option') ?>
                        </p>
                        <div class="phones">
                            <?
                            $phones = [get_field('телефон', 'option'), get_field('телефон_мобильный', 'option')];
                            foreach ($phones as $phone): ?>
                                <a href="<?= phoneLink($phone) ?>" class="phone"><?= $phone ?></a>
                            <? endforeach; ?>
                            <a href="" class="callback"><span class="icon"></span>Заказать обратный
                                звонок</a>
                        </div>
                    </div>
                    <button class="toggle-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <nav class="header-nav">
                        <? wp_nav_menu([
                            'menu' => 'Хедер',
                            'container' => null,
                            'items_wrap' => '<ul  class="header-menu">%3$s</ul>',
                        ]); ?>
                    </nav>
                </div>
            </div>
            <? if (is_front_page()): ?>
                <div class="row home-block align-items-center">
                    <nav class="header-categories col-xl-5 col-lg-6">
                        <ul>
                            <?
                            $categories = get_terms([
                                'taxonomy' => 'product_cat',
                                'parent'         => 0,
                                'child_of' => 0,
                            ]);
                            foreach ($categories as $category):
                                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                $image = get_attached_file($thumbnail_id);
                                ?>
                                <li><a href="<?= get_term_link($category) ?>">
                                        <div class="icon">
                                            <? if ($image) {
                                                require $image;
                                            } ?>
                                        </div>
                                        <span><?= $category->name ?></span></a></li>
                            <? endforeach; ?>
                        </ul>
                    </nav>
                    <div class="owl-carousel col-xl-7 col-lg-6">
                        <?
                        $gallery = get_field('хедер_банер', 'option');
                        foreach ($gallery as $img):
                            ?>
                            <a href="<?= $img['caption'] ?>" target="_blank"><img src="<?= $img['url'] ?>"
                                                                                  alt="<?= $img['alt'] ?>"
                                                                                  class="img-fluid"></a>
                        <? endforeach; ?>
                    </div>
                </div>
            <? endif; ?>
        </div>
    </header>
<div class="container">
<? if (is_front_page()): ?>
    <div class="products-list">
        <div class="title title-line">
            <div class="text">Новинки</div>
        </div>
        <ul class="products owl-carousel">
            <?
            $productQuery = $Boom->latestProducts(15);
            while ($productQuery->have_posts()) {
                $productQuery->the_post();
                wc_get_template_part('content', 'product');
                wp_reset_query();
            } ?>
        </ul>
    </div>
<? endif; ?>
    <div class="row flex-column-reverse flex-lg-row align-items-center align-items-lg-start">
<? get_sidebar() ?>
    <div class="col-lg-9 ">
<? if (!is_front_page()) $Boom->breadcrumb() ?>