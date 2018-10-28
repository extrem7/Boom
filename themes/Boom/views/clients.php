<div class="our-clients">
    <?
    $company = get_page_template_slug() == 'pages/company.php';
    if (!$company): ?>
        <div class="title title-line title-line-plain">
            <div class="text"><? the_field('клиенты_заголовок', 'option') ?></div>
        </div>
    <? endif; ?>
    <div class="d-flex flex-wrap align-items-center justify-content-around <?= $company ? 'mt-3' : '' ?>">
        <?
        $gallery = get_field('клиенты', 'option');
        foreach ($gallery as $img): ?>
            <a href="<?= $img['caption'] ?>" target="_blank"><img
                        src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>"></a>
        <? endforeach; ?>
    </div>
</div>