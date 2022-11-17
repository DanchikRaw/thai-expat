<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Thai_Expat
 */
get_header();
?>
    <section class="page-header">
        <img class="page-header__img" src="<?= get_template_directory_uri() ?>/dist/images/category.jpg" alt="cat">
        <div class="page-header__title"><?= single_cat_title() ?></div>
    </section>
    <section class="posts">
        <div class="container">
            <div class="posts__description">
                <?= category_description(get_query_var('cat')); ?>
            </div>
            <?php
            $query = getCategoryPosts();
            if ($query->have_posts()): ?>
            <div class="row">
            <?php while($query->have_posts()): $query->the_post(); ?>
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
            <div class="posts__not-found">Статьи в разработке!</div>
            <?php endif;
            ?>
        </div>
    </section>
    <section class="partners">
        <div class="container">
            <div class="partners__section-title"><b>Проверенные партнеры</b> в регионах</div>
            <?php
            $posts = getCategoryChildren();
            if (!empty($posts)):
            ?>
                <div class="swiper partners__swiper partnersSwiper">
                    <div class="swiper-wrapper">
                <?php foreach( $posts as $post ): setup_postdata( $post ); ?>
                        <div class="swiper-slide partners__slide">
                            <a href="<?= get_permalink(); ?>" class="partners__link">
                                <?= thai_expat_thumbmail($post, 'partners__img'); ?>
                                <div class="partners__content">
                                    <div class="partners__title"><?= the_title(); ?></div>
                                    <div class="arrow-link">
                                        <span>Перейти</span>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="arrow" class="arrow-link__img">
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="partners__control">
                    <div class="arrow__wrap">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="prev" class="arrow__btn arrow__prev partnersPrev">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="newt" class="arrow__btn arrow__newt partnersNext">
                    </div>
                    <div class="partnersPagination"></div>
                </div>
            <?php else: ?>
            <div class="partners__not-found">Список партнёров ещё пуст!</div>
            <?php endif; ?>
        </div>
    </section>
<?php get_template_part( 'template-parts/help-info' ); ?>
<?php
get_footer();