</div>
</div>
</div>
<footer class="footer">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            <div class="footer-block">
                <p class="title">КОНТАКТЫ</p>
                <? $phone = strip_tags(get_field('телефон', 'option')); ?>
                <div class="d-flex"><i class="fas fa-phone fa-rotate-90"></i> <a href="<?= phoneLink($phone) ?>"
                                                                                 class="phone"><?= $phone ?></a></div>
                <? $phone = strip_tags(get_field('телефон_мобильный', 'option')); ?>
                <div class="d-flex"><i class="fas fa-mobile-alt"></i>
                    <p><a href="<?= phoneLink($phone) ?>" class="phone"><?= $phone ?></a></p></div>
                <div class="d-flex">
                    <i class="fas fa-envelope"></i>
                    <?
                    $mail = get_field('почта', 'option')
                    ?>
                    <p><a href="mailto:<?= $mail ?>"><?= $mail ?></a></p>
                </div>
                <div class="d-flex">
                    <i class="fas fa-map-marker-alt"></i>
                    <p><? the_field('адрес', 'option') ?><br><br>
                        Режим работы<br><? the_field('режим_работы', 'option') ?></p>
                </div>
            </div>
            <div class="footer-block">
                <p class="title">Компания</p>
                <ul>
                    <? wp_nav_menu([
                        'menu' => 'Компания',
                        'container' => null,
                        'items_wrap' => '%3$s',
                    ]); ?>
                </ul>
            </div>
            <div class="footer-block">
                <p class="title">товары</p>
                <ul>
                    <?
                    $categories = get_terms([
                        'taxonomy' => 'product_cat',
                        'parent' => 0,
                        'child_of' => 0,
                    ]);
                    foreach ($categories as $category):
                        ?>
                        <li><a href="<?= get_term_link($category) ?>"><?= $category->name ?></a></li>
                    <? endforeach; ?>
                </ul>
            </div>
            <div class="footer-block">
                <p class="title">Услуги</p>
                <ul>
                    <? wp_nav_menu([
                        'menu' => 'Услуги',
                        'container' => null,
                        'items_wrap' => '%3$s',
                    ]); ?>
                </ul>
            </div>
            <div class="footer-block">
                <p class="title">Присоединяйтесь к нам</p>
                <p>Присоединяйтесь к нам<br>в социальных сетях:</p>
                <div class="social">
                    <?
                    while (have_rows('соц_сети', 'option')) {
                        the_row();
                        $link = get_sub_field('ссылка');
                        $icon = get_sub_field('иконка');
                        echo "<a href='$link' target='_blank'><i class='fab $icon'></i></a>";
                    }
                    ?>
                </div>
                <div class="dev">
                    <p>Создано компанией</p>
                    <a href="<? the_field('itnp', 'option') ?>"><img src="<?= path() ?>assets/img/author.png"
                                                                     alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright"><? the_field('копирайт', 'option') ?></div>
</footer>
<? wp_footer() ?>
</body>
</html>