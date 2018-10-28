window.onload = function () {
    function a(a, b) {
        var c = /^(?:file):/, d = new XMLHttpRequest, e = 0;
        d.onreadystatechange = function () {
            4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText)
        };
        try {
            d.open("GET", b, !0), d.send()
        } catch (f) {
        }
    }

    var b, c = document.getElementsByTagName("*");
    for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include"))
};

function bodyClass($class) {
    return $('body').hasClass($class);
}

function header() {
    $('.header .toggle-btn').click(() => {
        $('.header .header-nav').slideToggle();
        $('.header .toggle-btn').toggleClass('active');
    });
    $('input[type=tel]').mask("+8 (999) 999 - 9999");
    $('.contact-form .btn-red').click(function (e) {
        if (!$('.contact-form #confirm').prop('checked')) {
            e.preventDefault();
        }
    });
    $('.callback').click(function () {
        event.preventDefault();
        let target = $('.contact-form'),
            top = $(target).offset().top - 50;
        $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()), function () {
            $('.contact-form .your-name input').focus();
        });
    });
}

function catalogMenu() {
    $('.has-children > a').click(function (e) {
        e.preventDefault();
        $(this).find('+ .children').slideToggle(() => {
            if (!$(this).parent().hasClass('current-cat')) {
                $(this).find('+ .children  .children').slideUp();
                $(this).find('+ .children  .current-cat').removeClass('current-cat');
            }
        });
        $(this).parent().toggleClass('current-cat');
    });
}

function cart() {
    $('.size input').on("change click", function () {
        let count = $(this).val();
        count = count > 0 ? count : 1;

        let price = parseInt(Calculator.price);

        if (!Calculator.wholesalePrice) {
            Calculator.wholesalePrice = price;
        }
        if (!Calculator.wholesaleBigPrice) {
            Calculator.wholesaleBigPrice = price;
        }

        if (count < parseInt(Calculator.wholesale)) {
            $('.modal .current-price span').text(price)
            price = count * price;
        } else if (count >= parseInt(Calculator.wholesale) && count < parseInt(Calculator.wholesaleBig)) {
            price = count * parseInt(Calculator.wholesalePrice);
            $('.modal .current-price span').text(Calculator.wholesalePrice)
        } else {
            price = count * parseInt(Calculator.wholesaleBigPrice);
            $('.modal .current-price span').text(Calculator.wholesaleBigPrice)
        }

        $('.size input').val(count);
        $('.modal .total span').text(`${price} руб.`);
    });
    $('.modal .form').submit(function (e) {
        e.preventDefault();
        let data = {
            action: 'ajax_add_to_cart',
            product_id: Calculator.product_id,
            count: $('.modal .size input').val(),
            price: parseInt($('.modal .current-price span').text()),
            name: $('#name').val(),
            tel: $('#tel').val(),
            billing: $('#billing').val(),
            payment: $('#payment').val(),
            comment: $('#comment').val(),
        };
        $.post(wc_add_to_cart_params.ajax_url, data, function (res) {
            res = JSON.parse(res);
            if (res.status == 'success') {
                $('#success').modal('show');
                setTimeout(function () {
                    $('#success').modal('hide');
                }, 8000);
            }
        }).done(function () {
            $('#cart').modal('hide');
        });
    });
}

function companyMenu() {
    $(".sidebar .company-menu a").click(function (event) {
        event.preventDefault();
        let target = $(this).attr('href'),
            top = $(target).offset().top - 50;
        $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()));
    });
}

function fileInput() {
    'use strict';

    ;(function ($, window, document, undefined) {
        $('.inputfile').each(function () {
            var $input = $(this),
                $label = $input.parent().next('label'),
                labelVal = $label.html();

            $input.on('change', function (e) {
                var fileName = '';

                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else if (e.target.value)
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    $label.find('span').html(fileName);
                else
                    $label.html(labelVal);
            });

            // Firefox bug fix
            $input
                .on('focus', function () {
                    $input.addClass('has-focus');
                })
                .on('blur', function () {
                    $input.removeClass('has-focus');
                });
        });
    })(jQuery, window, document);
}

$(() => {
    let carouselNavText = ['<i class="fal fa-long-arrow-left"></i>', '<i class="fal fa-long-arrow-right"></i>'];
    header();
    fileInput();
    if (bodyClass('home')) {
        $('.header .owl-carousel').owlCarousel({
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            navText: carouselNavText,
        });
        $('.products').owlCarousel({
            nav: true,
            dots: false,
            navText: carouselNavText,
            responsive: {
                1200: {
                    items: 5,
                },
                991: {
                    items: 4,
                },
                768: {
                    items: 3,
                },
                576: {
                    items: 2,
                    center: false,
                },
                0: {
                    items: 1,
                    center: true,
                }
            }
        });
    }
    if (bodyClass('page-template-company')) {
        companyMenu();
        $('.reviews-carousel').owlCarousel({
            nav: false,
            dots: false,
            navText: carouselNavText,
            items: 1,
            center: true,
            autoplay: true,
            responsive: {
                768: {
                    items: 2,
                    center: false,
                    nav: true,
                    autoplay: false,
                }
            }
        });
    }
    if (bodyClass('woocommerce')) {
        catalogMenu();
    }
    if (bodyClass('archive') && bodyClass('woocommerce') && !bodyClass('tax-product_cat') || bodyClass('single-product')) {
        $('.products').owlCarousel({
            nav: true,
            dots: false,
            navText: carouselNavText,
            responsive: {
                1200: {
                    items: 4,
                },
                991: {
                    items: 3,
                },
                576: {
                    items: 2,
                    center: false,
                },
                0: {
                    items: 1,
                    center: true,
                }
            }
        });
        if(window.innerWidth>991){
            $('.sidebar .contact-form').remove();
        }
    }
    if (bodyClass('tax-product_cat')) {
        $('.boom-sorting input').change(function () {
            $(this).closest('form').submit();
        });
    }
    if (bodyClass('tax-product_cat') || bodyClass('single-product')) {
        $('.header-menu a:contains("Каталог")').parent().addClass('current-menu-item')
    }
    if (bodyClass('single-product')) {
        $('.product-thumbnails .thumbnail').click(function () {
            let src = $(this).find('img').attr('src');
            $('.product-thumbnails .active').removeClass('active');
            $(this).addClass('active');
            $('.product-image > img').fadeOut(200, function () {
                $(this).attr('src', src).fadeIn(200);
            });
        });
        cart();
    }
});