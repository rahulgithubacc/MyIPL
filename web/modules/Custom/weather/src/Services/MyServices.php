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
				// $response->roundoff();
    }
    // public function roundoff()
    // {
    //     if(is_float($response['main']['temp_min']))
    //       $response['main']['temp_min'] = round($response['main']['temp_min']);
    //     if(is_float($response['main']['temp_max']))
		// 			$response['main']['temp_max'] = round($response['main']['temp_max']);
		// 		if(is_float($response['main']['pressure']))
		// 			$response['main']['humidity'] = round($response['main']['pressure']);
		// 		if(is_float($response['main']['humidity']))
		// 			$response['main']['humidity'] = round($response['main']['humidity']);
		// 		if(is_float($response['main']['temp']))
		// 			$response['main']['temp'] = round($response['main']['temp']);
		//  		return $response->getBody();
		// }
}
