<?php
namespace Drupal\weather\Services;
class MyServices{
    public $appid;
    public function myservice($city)
    {
        $appid=\Drupal::config('weather.settings')->get('appid');
        $client=new \GuzzleHttp\Client();
        $response=$client->request('GET', 'https://samples.openweathermap.org/data/2.5/weather?q='.$city.'&appid=b6907d289e10d714a6e88b30761fae22');
        return $response->getBody();
    }
}
