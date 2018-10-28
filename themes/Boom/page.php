<? get_header(); ?>
<?= apply_filters('the_content', wpautop(get_post_field('post_content', $id), true)); ?>
<? $Boom->form() ?>
<? get_footer() ?>
<? get_footer(); ?>