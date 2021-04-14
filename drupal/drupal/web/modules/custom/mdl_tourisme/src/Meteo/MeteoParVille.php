<?php

namespace Drupal\mdl_tourisme\Meteo;

class MeteoParVille
{

  private $token = '5f84ff6e3faadf5d55aa52af0e427e79854779ca7198f5142de2adc54bf8598d';
  private $base_url = 'https://api.meteo-concept.com/api/forecast/daily?token=5f84ff6e3faadf5d55aa52af0e427e79854779ca7198f5142de2adc54bf8598d&insee=';

  public function getMeteoByTown($townCodeInsee)
  {
    $uri = $this->base_url.$townCodeInsee;
    $dayOfWeekarr = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    try {
      $response = \Drupal::httpClient()->get($uri, array('headers' => array('Accept' => 'text/plain')));
      $data = (string) $response->getBody();

      $dataArr = json_decode($data, true);
      $today = date("Y/m/d");

      //Prenons juste la prévision pour aujourd'hui plus les cinq prochains jours
      $dataArr['forecast'] = array_slice($dataArr['forecast'], 0, 6);

      $k = 0;
      $fiveDayForecastArr = [];

      foreach($dataArr['forecast'] as $key => $forecastArr){

        if($k > 0) {
          $nextDayTimestamp = strtotime($today. ' + '.$k++.' days');
          //On recupère le jour de la semaine ici pour l'affichage meteo
          $dayOfWeek = date("w", $nextDayTimestamp);
          $fiveDayForecastArr[$dayOfWeekarr[$dayOfWeek]] = $this->_formatResultArr($forecastArr);
        }else {
          $fiveDayForecastArr['aujourd\'hui'] = $this->_formatResultArr($forecastArr);
          $k++;
        }
      }

      $dataArr['forecast'] = $fiveDayForecastArr;

      if (empty($dataArr)) {
        return FALSE;
      }
    }
    catch (\GuzzleHttp\Exception\RequestException $e) {
      return FALSE;
    }

    return $dataArr;
  }

  public function getCurrentCityInseeByPostalCode(){

    $json     = file_get_contents("http://ipinfo.io");
    $json     = json_decode($json, true);
    $postalCode  = $json['postal'];
    $uri = "https://api.meteo-concept.com/api/location/cities?token=$this->token&search=$postalCode";
    try {
      $response = \Drupal::httpClient()->get($uri, array('headers' => array('Accept' => 'text/plain')));
      $data = (string) $response->getBody();

      $citiesArr = json_decode($data, true);

      if (empty($citiesArr['cities'])) {
        return FALSE;
      }
      $codeInsee = $citiesArr['cities'][0]["insee"];
    }
    catch (\GuzzleHttp\Exception\RequestException $e) {
      return FALSE;
    }

    return $codeInsee;
  }

  public function getWeatherImgName($weatherCode)
  {
    $expectedTermsWeatherArr = ['soleil', 'peu', 'nuageux', 'pluie', 'grele', 'brouillard'];
    $weatherFile = file_get_contents('/var/www/html/web/modules/custom/mdl_tourisme/src/Weather/weather.txt');
    $weatherFileArr = preg_split("/[\t\n,]+/", $weatherFile);
    $weatherFileArr = array_filter($weatherFileArr, function($value) {
      return (intval($value) == 0 && !empty($value));
    });

    //reindexer le tableau
    $weatherFileArr = array_values($weatherFileArr);

    $textWeather = $weatherFileArr[$weatherCode];
    $textWeatherArr = preg_split("/[\s]+/", $textWeather);
    $textWeatherArr = array_map('strtolower', $textWeatherArr);

    $commonValuesArr = array_intersect($expectedTermsWeatherArr, $textWeatherArr);
    $termUsedArray = array_values($commonValuesArr);

    if(sizeof($commonValuesArr) == 2) {
      $nameImg = $termUsedArray[0].'_'.$termUsedArray[1];
    }else {
      $nameImg = array_pop($termUsedArray);
    }


    return $nameImg.'|'.$textWeather;
  }

  //On formatte le tableau pour recuperer juste des infos precises dont on aura besoin en sortie
  public function _formatResultArr($forecastArr)
  {
    $data = ['tmin' => '', 'tmax' => '', 'rr10' => '', 'weather' => ''];

    return array_intersect_key($forecastArr, $data);
  }

}
