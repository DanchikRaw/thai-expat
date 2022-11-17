<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thai_Expat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>
<main>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col col-50 col-m-100">
                    <div class="header__inner header__inner-menu">
                        <a href="/" class="logo">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/logo.png" alt="Logo" class="logo__img">
                            <span class="logo__slogan">Дом там, где свои</span>
                        </a>
                        <?php
                        wp_nav_menu([
                            'theme_location'  => 'header',
                            'menu_class' => 'header_nav',
                            'container' => false,
                            'fallback_cb' => ''
                        ]);
                        ?>
                        <div class="mobile-btn mobile-btn-js">
                            <div class="mobile-btn__line"></div>
                            <div class="mobile-btn__line"></div>
                            <div class="mobile-btn__line"></div>
                        </div>
                        <div class="mobile-menu mobile-menu-js">
                            <div class="container">
                                <div class="mobile-menu__close-wrap">
                                    <img src="<?= get_template_directory_uri() ?>/dist/images/close.png" alt="" class="mobile-menu__close mobile-close-js">
                                </div>
                                <?php
                                wp_nav_menu([
                                    'theme_location'  => 'header-mob',
                                    'menu_class' => 'mobile-menu__nav',
                                    'container' => false,
                                    'fallback_cb' => ''
                                ]);
                                ?>
                                <div class="mobile-menu__footer">
                                    <div class="social mobile-menu__social">
                                        <a class="social__link" href="/">
                                            <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/inst.png" alt="instagram">
                                        </a>
                                        <a class="social__link" href="https://web.facebook.com/groups/841634187170453">
                                            <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/fb.png" alt="instagram">
                                        </a>
                                        <a class="social__link" href="https://vk.com/thaiexpat">
                                            <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/vk.png" alt="instagram">
                                        </a>
                                        <a class="social__link" href="https://t.me/Thai4Expat">
                                            <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/telegram.png" alt="instagram">
                                        </a>
                                    </div>
                                    <form class="search mobile-menu__search" action="https://forum.thai-expat.org/">
                                        <input placeholder="Поиск по информации..." class="search__input" type="text" name="search">
                                        <button class="search__btn"><img class="search__ico" src="<?= get_template_directory_uri() ?>/dist/images/search.png" alt="search"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-50 header__left">
                    <div class="header__inner header__inner-search">
                        <div class="social">
                            <a class="social__link" href="/">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/inst.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://web.facebook.com/groups/841634187170453">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/fb.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://vk.com/thaiexpat">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/vk.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://t.me/Ftekomobigarek">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/telegram.png" alt="instagram">
                            </a>
                        </div>
                        <form class="search header__search" action="https://forum.thai-expat.org/">
                            <input placeholder="Поиск по информации..." class="search__input" type="text" name="search">
                            <button class="search__btn"><img class="search__ico" src="<?= get_template_directory_uri() ?>/dist/images/search.png" alt="search"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
