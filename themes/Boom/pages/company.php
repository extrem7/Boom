<? /* Template Name: О компании */
get_header(); ?>
    <div class="title text-center mb-4" id="about">
        <div class="text">о Компании “Бум”</div>
    </div>
    <p>
        <?= wpautop(get_post_field('post_content', $id), true) ?>
    </p>
    <div class="title text-center mt-5 mb-4" id="about-us">
        <div class="text">Почему мы</div>
    </div>
    <div class="advantages row justify-content-between">
        <? get_template_part('views/about') ?>
    </div>
    <div class="title text-center mt-4 mb-4" id="our-clients">
        <div class="text">Наши кленты</div>
    </div>
<?= wpautop(get_field('клиенты'), true) ?>
<? $Boom->clients() ?>
    <div class="title text-center  mb-4" id="reviews">
        <div class="text">отзывы о нас</div>
    </div>
<?= wpautop(get_field('отзывы_текст'), true) ?>
    <div class="reviews-carousel owl-carousel">
        <? while (have_rows('отзывы')):the_row() ?>
            <div class="review">
                <div class="photo"><img <? repeater_image('фото') ?>></div>
                <div class="info">
                    <p class="name"><? the_sub_field('имя') ?></p>
                    <div class="text"><? the_sub_field('текст') ?></div>
                </div>
            </div>
        <? endwhile; ?>
    </div>
    <div class="title text-center mt-5 mb-5" id="documents">
        <div class="text">Документы и реквизиты</div>
    </div>
<?= wpautop(get_field('документы'), true) ?>
    <div class="mb-5 pb-5">
        <? get_template_part('views/payment') ?>
    </div>
<? $Boom->form() ?>
<? get_footer() ?>