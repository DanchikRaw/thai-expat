<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Thai_Expat
 */

get_header();
?>
<section class="single">
    <?php while (have_posts()): the_post(); ?>
    <div class="single__header">
        <?= thai_expat_thumbmail(get_post(), 'single__header-img'); ?>
    </div>
    <div class="container single__container">
        <div class="single__title"><?= the_title(); ?></div>
        <div class="single__inner">
            <div class="row single__inner">
                <div class="col col-66 col-xl-100">
                    <div class="single__content single-js">
                        <?= the_content(); ?>
                        <div class="single__info"><?= the_date(); ?> </div>
                    </div>
                    <?php comments_template( '/comments.php' ); ?>
                </div>
                <div class="col col-33 col-xl-100">
                    <div class="single__sidebar">
                        <div class="single__sidebar-item">
                            <div class="single__sidebar-title">Погода и курс сейчас</div>
                            <div class="swiper singleWeatherSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide weather-slider__slide">
                                        <div class="courses-item single__courses">
                                            <div class="courses-item__header">
                                                <div class="courses-item__title">Курс THB</div>
                                                <img src="<?= get_template_directory_uri() ?>/dist/images/thailand.png" alt="flag" class="courses-item__img">
                                            </div>
                                            <div class="courses-item__list">
                                                <?php
                                                $courses = fileReadCron('courses');
                                                foreach ($courses['rates'] as $key => $course):
                                                    ?>
                                                    <div class="courses-item__list-item">
                                                        <div class="courses-item__fiat">1 <?= $key ?></div>
                                                        <div class="courses-item__thb"><?= $course ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $weather = fileReadCron('weather');
                                    foreach ($weather as $city):
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="weather-slider__item">
                                                <div class="weather-slider__name"><?= $city['name'] ?></div>
                                                <div class="weather-slider__temp-wrap">
                                                    <img src="http://openweathermap.org/img/wn/<?= $city['weather']['weather'][0]['icon'] ?>@2x.png" alt="sun" class="slider__weather-ico">
                                                    <div class="weather-slider__temp"><?= round($city['weather']['main']['temp']) ?>°</div>
                                                </div>
                                                <div class="weather-slider__info-wrap">
                                                    <div class="weather-slider__info">
                                                        <span>Ветер</span>
                                                        <span><?= round($city['weather']['wind']['speed']) ?>м/с</span>
                                                    </div>
                                                    <div class="weather-slider__info">
                                                        <span>Влажность</span>
                                                        <span><?= $city['weather']['main']['humidity'] ?>%</span>
                                                    </div>
                                                    <div class="weather-slider__info">
                                                        <span>Давление</span>
                                                        <span><?= $city['weather']['main']['pressure'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="arrow__wrap">
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="prev" class="arrow__btn arrow__prev singleWeatherPrev">
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="newt" class="arrow__btn arrow__newt singleWeatherNext">
                            </div>
                        </div>
                        <?php if (get_post_type() != 'news'): ?>
                        <div class="single__sidebar-item">
                            <div class="single__sidebar-title">Похожии статьи</div>
                                        <?php $query = getSimilarPosts(); ?>
                                            <div class="swiper singleSimilarSwiper">
                                                <div class="swiper-wrapper">
                                                    <?php while($query->have_posts()): $query->the_post() ?>
                                                        <div class="swiper-slide post-mini__slide">
                                                            <a href="<?= get_permalink(); ?>" class="post-mini">
                                                                <?= thai_expat_thumbmail($query->get_post(), 'post-mini__img'); ?>
                                                                <div class="post-mini__text">
                                                                    <div class="post-mini__header">
                                                                        <div class="post-mini__title"><?= the_title(); ?></div>
                                                                        <div class="post-mini__desc"><?= wp_trim_words(get_the_content(), 25, ' ...'); ?></div>
                                                                    </div>
                                                                    <div class="post-mini__footer">
                                                                        <span class="post-mini__link-txt">Читать...</span>
                                                                        <span class="post-mini__date"><?= get_the_date(); ?></span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php endwhile; wp_reset_postdata(); ?>
                                                </div>
                                            </div>
                            <div class="arrow__wrap">
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="prev" class="arrow__btn arrow__prev singleSimilarPrev">
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="newt" class="arrow__btn arrow__newt singleSimilarNext">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</section>
<?php get_template_part( 'template-parts/help-info' ); ?>
<?php
get_footer();
