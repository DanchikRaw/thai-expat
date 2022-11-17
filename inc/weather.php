<?php
function getWeather($lat, $lon) {
    $api_key = '82dcf87eeedd1837ef0c8ae30185d884';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$api_key}&units=metric");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output, true);
}

function getWeatherArray($cities) {
    $res = [];
    foreach ($cities as $key => $city) {
        $res[$key]['weather'] = getWeather($city['lat'], $city['lon']);
        $res[$key]['name'] = $city['name'];
    }

    return $res;
}

add_filter( 'cron_schedules', 'cron_add_five_min' );
function cron_add_five_min( $schedules ) {
    $schedules['min'] = array(
        'interval' => 60,
        'display'  => 'Раз в 1 минуту'
    );
    return $schedules;
}
add_action('after_switch_theme', 'cron_weather_activate');
function cron_weather_activate() {
    // удалим на всякий случай все такие же задачи cron, чтобы добавить новые с "чистого листа"
    // это может понадобиться, если до этого подключалась такая же задача неправильно (без проверки что она уже есть)
    wp_clear_scheduled_hook( 'my_weather_event' );


    // добавим новую cron задачу
    wp_schedule_event( time(), 'min', 'my_weather_event');
}

add_action('switch_theme', 'cron_weather_deactivate');
function cron_weather_deactivate() {
    wp_clear_scheduled_hook( 'my_weather_event' );
}

add_action( 'my_weather_event', 'weatherSaveFile' );
function weatherSaveFile() {
    $weather = getWeatherArray([
        [
            'name' => 'Пхукет',
            'lat' => 7.949,
            'lon' => 98.339
        ],
        [
            'name' => 'Паттайя',
            'lat' => 12.890,
            'lon' => 100.917
        ],
        [
            'name' => 'Бангкок',
            'lat' => 13.764,
            'lon' => 100.536
        ],
        [
            'name' => 'Самуй',
            'lat' => 9.512,
            'lon' => 100.011
        ]
    ]);
    file_put_contents(get_theme_file_path() . '/cron/weather.txt', json_encode($weather));
}

function fileReadCron($name) {
    $file = file_get_contents(get_theme_file_path() . "/cron/{$name}.txt");

    return json_decode($file, true);
}
