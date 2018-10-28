<?

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post, $product;
$product = wc_get_product($post->ID);

get_header('shop'); ?>
    <div class="product-row">
        <div class="product-info">
            <? wc_get_template('single-product/title.php'); ?>
            <p class="articulus">Артикул: <?= $product->get_sku() ?></p>
            <? wc_get_template('single-product/short-description.php'); ?>
            <? wc_get_template('single-product/price.php'); ?>
            <div class="sizes">
                <b>Выберите количество:</b>
                <div class="size">
                    <!--<select>
                        <option value="">Разм: 44-46 Рост: 170-176</option>
                        <option value="">Разм: 48-50 Рост: 182-188</option>
                    </select>
                    <div class="count">в наличии 77</div>-->
                    <input type="number" value="1" min="1">
                    <span>шт.</span>
                </div>
                <button class="button btn-order" data-toggle="modal" data-target="#cart">Оформить заказ</button>
                <!--<button class="add-size"><i class="fal fa-plus-circle"></i> Добавить размер</button>-->
            </div>
        </div>
        <div class="product-image">
            <div class="made-by-boom"></div>
            <? wc_get_template('single-product/product-image.php'); ?>
            <? wc_get_template('single-product/product-thumbnails.php'); ?>
        </div>
    </div>
    <!--<div class="totals">
        <div>
            <p class="current-price">Оптовая цена: 1350 руб.</p>
            <p class="total">ЗАКАЗ НА СУММУ: <span>54 000 руб.</span></p>
        </div>
        <button class="button btn-order">Оформить заказ</button>
    </div>-->
    <b class="product-services-title">Дополнительные услуги:</b>
    <div class="product-services">
        <?
        while (have_rows('дополнительные_услуги', 'option')):the_row();
            ?>
            <a href="<? the_sub_field('ссылка') ?>" target="_blank" class="service-item">
                <img <? repeater_image('картинка') ?>>
                <? require get_attached_file(get_sub_field('иконка')) ?>
                <p><? the_sub_field('название') ?></p>
            </a>
        <? endwhile; ?>
    </div>
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#attributes">Описание</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#delivery">Доставка</a></li>
        <? if (get_field('таблица_размеров')): ?>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sizes">Таблица размеров</a>
            <?
            endif; ?>
        </li>
    </ul>
    <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active table-responsive" id="attributes">
            <table class="table">
                <? $Boom->printAttributes($product); ?>
            </table>
        </div>
        <div class="tab-pane fade show" id="delivery">
            <?= apply_filters('the_content', wpautop(get_post_field('post_content', 14), true)); ?>
        </div>
        <div class="tab-pane fade show table-responsive" id="sizes">
            <table class="table">
                <? the_table('таблица_размеров') ?>
            </table>
        </div>
    </div>
<? wc_get_template('single-product/related.php'); ?>
    <div class="d-none d-lg-block">
        <? $Boom->clients() ?>
        <? $Boom->form() ?>
    </div>
    <div class="modal fade" id="cart" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-border">
                    <div class="modal-header">
                        <h5 class="modal-title">форма заказа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex flex-wrap flex-sm-nowrap justify-content-center">
                        <div class="product-image">
                            <div class="made-by-boom"></div>
                            <? wc_get_template('single-product/product-image.php'); ?>
                        </div>
                        <div class="product-info">
                            <? wc_get_template('single-product/title.php'); ?>
                            <div class="sizes">
                                <div class="size">
                                    <!--<select>
                                        <option value="">Разм: 44-46 Рост: 170-176</option>
                                        <option value="">Разм: 48-50 Рост: 182-188</option>
                                    </select>
                                    <div class="count">в наличии 77</div>-->
                                    <span class="count">Количество : </span>
                                    <input type="number" value="1" min="1">
                                    <span>шт.</span>
                                </div>
                            </div>
                            <div class="totals">
                                <div>
                                    <p class="current-price">По цене: <span><?= $product->get_price() ?></span> руб за 1
                                        шт.</p>
                                    <p class="total">ЗАКАЗ НА СУММУ: <span><?= $product->get_price() ?> руб.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="form-title">Пожалуйста заполните форму:</p>
                        <form action="" class="form">
                            <div class="inputs">
                                <input type="text" id="name" placeholder="Ваше имя">
                                <input type="tel" id="tel" placeholder="Ваш номер телефона (обязятельно)" required>
                                <select name="billing" id="billing">
                                    <? while (have_rows('способы_доставки', 'option')):
                                        the_row();
                                        $name = get_sub_field('название');
                                        ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                    <? endwhile; ?>
                                </select>
                                <select name="payment" id="payment">
                                    <? while (have_rows('способы_оплаты', 'option')):
                                        the_row();
                                        $name = get_sub_field('название');
                                        ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                    <? endwhile; ?>
                                </select>
                                <textarea name="comment" id="comment" placeholder="Размер, пожелания и тд."></textarea>
                            </div>
                            <button class="button btn-order">отправить</button>
                        </form>
                        <p class="form-additional">Отправляя заявку вы соглашаетесь на обработку персональных
                            данных.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="success" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-border">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img <? the_image('лого', 'option') ?> class="img-fluid">
                        <p class="thanks">СПАСИБО</p>
                    </div>
                    <div class="modal-footer">
                        <p class="form-title">спасибо что доверяете нам!<br>
                            Скоро я с вами свяжусь и обговорим все детали вашего заказа</p>
                        <p class="form-additional">- Ваш менеджер -</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? get_footer('shop');
