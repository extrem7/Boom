<? /* Template Name: Услуги */
get_header(); ?>
    <div class="title mb-4">
        <div class="text">Наши услуги</div>
    </div>
    <div class="info-block d-flex flex-column-reverse flex-sm-row align-items-center">
        <div class="mr-3">
            <? require get_template_directory() . "/assets/img/services.svg" ?>
        </div>
        <div class="mb-3 mb-sm-0">
            <? $Boom->content() ?>
        </div>
    </div>
    <div class="services-title text-center"><? the_field('заголовок') ?></div>
    <div class="services">
        <? while (have_rows('услуги')):the_row() ?>
            <div class="service-item">
                <p class="item-title"><? the_sub_field('название') ?></p>
                <img <? repeater_image('иконка') ?> class="img-fluid">
                <p><? the_sub_field('текст') ?></p>
            </div>
        <? endwhile; ?>
    </div>
<? $Boom->form() ?>
<? get_footer() ?>