<?php
function getCourse() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/fixer/latest?symbols=RUB%2C%20EUR%2C%20USD%2C%20JPY&base=THB",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: Ce7cX52phS0OylTg3P26a2c0vw9RRMY6"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}

add_action('after_switch_theme', 'cron_courses_activate');
function cron_courses_activate() {
    // удалим на всякий случай все такие же задачи cron, чтобы добавить новые с "чистого листа"
    // это может понадобиться, если до этого подключалась такая же задача неправильно (без проверки что она уже есть)
    wp_clear_scheduled_hook( 'my_courses_event' );


    // добавим новую cron задачу
    wp_schedule_event( time(), 'daily', 'my_courses_event');
}

add_action('switch_theme', 'cron_courses_deactivate');
function cron_courses_deactivate() {
    wp_clear_scheduled_hook( 'my_courses_event' );
}

add_action( 'my_courses_event', 'coursesSaveFile' );
function coursesSaveFile() {
    if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
        $courses = getCourse();
        file_put_contents(get_theme_file_path() . '/cron/courses.txt', $courses);
    }
}

