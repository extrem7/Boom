<? /* Template Name: Контакты */
get_header(); ?>
    <div class="title mb-5">
        <div class="text">наши контакты</div>
    </div>
    <div class="contact">
        <div class="contact-item">
            <div class="item-header">
                <i class="fal fa-map-marker-alt"></i>
                <p class="contact-title">Адрес:</p>
            </div>
            <div class="item-body"><? the_field('адрес', 'option') ?></div>
        </div>
        <div class="contact-item">
            <div class="item-header">
                <i class="fal fa-phone fa-rotate-90"></i>
                <p class="contact-title">Телефон:</p>
            </div>
            <div class="item-body"><? the_field('телефон', 'option') ?>
                <br><? the_field('телефон_мобильный', 'option') ?></div>
        </div>
        <div class="contact-item">
            <div class="item-header">
                <i class="fal fa-envelope"></i>
                <p class="contact-title">E-mail:</p>
            </div>
            <div class="item-body">
                <? the_field('почта', 'option') ?>
            </div>
        </div>
    </div>
    <div class="work-time row">
        <div class="col-sm-3 text-uppercase text-center text-sm-right">Часы работы:</div>
        <div class="col-sm-9"><? $Boom->content() ?></div>
    </div>
    <div class="map mt-5">
        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad5147f47473517e1a613e730f36c5b4fb6ce610200b195c3e15bbd65b21d79f0&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <p class="mt-5 mb-5 pb-4"><?= wpautop(get_field('доставка',18), true) ?></p>
<? $Boom->form() ?>
<? get_footer() ?>