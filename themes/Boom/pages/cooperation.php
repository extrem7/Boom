<? /* Template Name: Сотрудничество */
get_header(); ?>
    <div class="title mb-4">
        <div class="text">сотрудничество с нами</div>
    </div>
    <div class="info-block d-flex flex-column-reverse flex-sm-row align-items-center">
        <div class="mr-3">
            <? require get_template_directory() . "/assets/img/cooperation.svg" ?>
        </div>
        <div class="mb-3 mb-sm-0">
            <? $Boom->content() ?>
        </div>
    </div>
<? while (have_rows('список')):the_row(); ?>
    <div class="imperial-block">
        <? the_sub_field('текст') ?>
    </div>
<? endwhile; ?>
    <div class="mt-3 mb-5 pb-5"><?= wpautop(get_field('доставка'), true) ?></div>
<? $Boom->form() ?>
<? get_footer() ?>