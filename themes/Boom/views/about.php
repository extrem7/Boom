<?
$i = 0;
$company = get_page_template_slug() == 'pages/company.php';
while (have_rows('почему_мы', 8)):
    the_row();
    if (!$company && $i >= 3) {
        continue;
    } ?>
    <div class="col-lg-4 col-sm-6 <?= $company?'mb-4':'' ?>">
        <div class="icon">
            <img <? repeater_image('иконка') ?>>
        </div>
        <p class="title"><? the_sub_field('заголовок') ?></p>
        <p><? the_sub_field('текст') ?></p>
    </div>
    <?
    $i++;
endwhile; ?>