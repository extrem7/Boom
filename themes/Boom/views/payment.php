<ul class="payment-files">
    <?
    while (have_rows('договора', 'option')):the_row();
        ?>
        <li>
            <a href="<? the_sub_field('ссылка') ?>" target="_blank">
                <? $icon = get_attached_file(get_sub_field('иконка')['id']); ?>
                <div class="icon">
                    <? require $icon ?>
                </div>
                <span><? the_sub_field('название') ?></span></a></li>
    <? endwhile; ?>
</ul>