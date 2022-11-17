<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Thai_Expat
 */

get_header();
?>
    <section class="page-header">
        <img class="page-header__img" src="<?= get_template_directory_uri() ?>/dist/images/blog.jpg" alt="cat">
        <div class="page-header__title">Список всех статей</div>
    </section>
    <section class="posts">
        <div class="container">
            <?php
            if (have_posts()): ?>
                <div class="row">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="col col-33 posts__col col-m-50 col-s-100">
                            <a href="<?= get_permalink() ?>" class="posts__item">
                                <?= thai_expat_thumbmail( get_post(), 'posts__img'); ?>
                                <div class="posts__content">
                                    <div class="posts__title"><?= the_title() ?></div>
                                    <div class="arrow-link">
                                        <span>Перейти</span>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="arrow" class="arrow-link__img">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php the_posts_pagination([
                    'class' => 'pagination'
                ]); ?>
            <?php else: ?>
                <div class="posts__not-found">Список статей пуст!</div>
            <?php endif;
            ?>
        </div>
    </section>
<?php get_template_part( 'template-parts/help-info' ); ?>
<?php
get_footer();
