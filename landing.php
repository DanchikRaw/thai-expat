<?php
/*
Template Name: Landing Page Thai Expat
*/
get_header();
?>
    <section class="slider">
        <div class="swiper slider__img-wrap mainSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/slider/slide.jpg" alt="slide" class="slider__slide">
                </div>
                <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/slider/slide_2.jpg" alt="slide" class="slider__slide">
                </div>
                <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/slider/slide_3.jpg" alt="slide" class="slider__slide">
                </div>
                <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/slider/slide_4.jpg" alt="slide" class="slider__slide">
                </div>
                <div class="swiper-slide">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/slider/slide_5.jpg" alt="slide" class="slider__slide">
                </div>
            </div>
        </div>
<!--        <div class="slider__content">-->
            <div class="container slider__container">
                    <div class="slider__url">Thai-Expat.org</div>
                    <div class="row slider__info">
                        <div class="col col-50 col-m-100">
                            <h4 class="slider__title">Дом там, где свои</h4>
                            <p class="slider__about">Проект Thai Expat создан для объединения иностранцев, живущих в этой прекрасной стране. Здесь вас ждут провранная информация, ответы на самые горячие вопросы о жизни в Таиланде, а также общение и дружба. Присоединитесь!</p>
                            <div class="btn__wrap">
                                <a class="btn slider__btn slider__news" href="https://t.me/Thai4Expat"><img src="<?= get_template_directory_uri() ?>/dist/images/telegram.png" alt="" class="btn__ico">Свои в телеграм</a>
                                <a class="btn slider__btn" href="https://forum.thai-expat.org/"><img src="<?= get_template_directory_uri() ?>/dist/images/forum-chat.png" alt="" class="btn__ico">Форум</a>
                            </div>
                        </div>
                    </div>
                <div class="row row_right">
                    <div class="col col-50 col-m-100 col-xl-66">
                        <div class="swiper weatherSwiper slider__weather">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide weather-slider__slide">
                                    <div class="courses-item">
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
                                <div class="swiper-slide weather-slider__slide">
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
                    </div>
                </div>
                <div class="row slider__control row_a_center">
                    <div class="col col-50">
                        <div class="arrow__wrap">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="prev" class="arrow__btn arrow__prev weatherPrev">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="newt" class="arrow__btn arrow__newt weatherNext">
                        </div>
                    </div>
                    <div class="col col-50">
                        <div class="weatherPagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <?php if (!empty($categories = getCategoryLanding())):?>
            <div class="row categories__row">
                <?php foreach($categories as $category): ?>
                <div class="col <?= get_field('size', 'category_' . $category->term_id); ?> col-m-50 col-s-100 categories__col">
                    <a class="categories__link" href="/category/<?= $category->slug ?>">
                        <img src="<?= get_field('image', 'category_' . $category->term_id); ?>" alt="air" class="categories__img">
                        <div class="categories__inner">
                            <div class="categories__name"><?= $category->name ?></div>
                            <div class="arrow-link">
                                <span>Перейти</span>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="arrow" class="arrow-link__img">
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
                <div class="col col-100 categories__col">
                    <a class="categories__link" href="https://forum.thai-expat.org/">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/forum_cat.jpg" alt="air" class="categories__img">
                        <div class="categories__inner">
                            <div class="categories__name">Форум</div>
                            <div class="arrow-link">
                                <span>Перейти</span>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/arrow_white.svg" alt="arrow" class="arrow-link__img">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="news__section-title">Последние новости <b>Таиланда</b></div>
            <?php $news = getNewsSlider(); if($news->have_posts()): ?>
            <div class="swiper news__swiper newsSwiper">
                <div class="swiper-wrapper">
                    <?php while($news->have_posts()): $news->the_post() ?>
                        <div class="swiper-slide post-mini__slide">
                            <a href="<?= get_permalink(); ?>" class="post-mini">
                                <?= thai_expat_thumbmail($news->get_post(), 'post-mini__img'); ?>
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
            <div class="news__control">
                <div class="arrow__wrap">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="prev" class="arrow__btn arrow__prev newsPrev">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="newt" class="arrow__btn arrow__newt newsNext">
                </div>
                <div class="newsPagination"></div>
            </div>
            <?php else: ?>
            <div class="news__not-found">Новости не найдены!</div>
            <?php endif; ?>
        </div>
    </section>
    <section class="forum">
        <div class="container">
            <?php
            $forums = getForumInfo();
            ?>
            <div class="forum__section-title"><b>Форум</b> последние сообщения</div>
            <div class="swiper forumSwiper forum__swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($forums as $forum): ?>
                    <a href="<?= $forum->lastPost->url ?>" class="swiper-slide forum__item">
                            <img src="<?= get_template_directory_uri() ?>/dist/images/forum.png" alt="forum" class="forum__img">
                            <div class="forum__date"><?= $forum->lastPost->date ?></div>
                            <div class="forum__title"><?= $forum->title ?></div>
                            <div class="forum__text"><?= $forum->lastPost->content ?></div>
                            <div class="forum__link-txt">Читать...</div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="forum__control">
                <div class="arrow__wrap">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="prev" class="arrow__btn arrow__prev forumPrev">
                    <img src="<?= get_template_directory_uri() ?>/dist/images/arrow.svg" alt="newt" class="arrow__btn arrow__newt forumNext">
                </div>
                <div class="forumPagination"></div>
            </div>
        </div>
    </section>
<?php
//get_sidebar();
get_footer();
