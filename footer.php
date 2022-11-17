<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thai_Expat
 */

?>
<footer class="footer">
    <div class="container">
        <div class="footer__up">
            <div class="row">
                <div class="col col-25 col-m-50 col-xs-100">
                    <div class="footer__col footer__left">
                        <a href="/" class="logo footer__logo">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/logo.png" alt="Logo" class="logo__img">
                            <div class="logo__slogan">Дом там, где свои</div>
                        </a>
                    </div>
                </div>
                <div class="col col-50 footer__center">
                    <div class="footer__col">
                        <div class="footer__text">Thai-Expat</div>
                    </div>
                </div>
                <div class="col col-25 col-m-50 col-xs-100">
                    <div class="footer__col footer__right">
                        <div class="social">
                            <a class="social__link" href="/">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/inst_w.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://web.facebook.com/groups/841634187170453">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/fb_w.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://vk.com/thaiexpat">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/vk_w.png" alt="instagram">
                            </a>
                            <a class="social__link" href="https://t.me/Thai4Expat">
                                <img class="social__img" src="<?= get_template_directory_uri() ?>/dist/images/telegram_w.png" alt="instagram">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__down">
            <div class="footer__copy">Copyright by "Thai Expat" © 2022.</div>
        </div>
    </div>
</footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
