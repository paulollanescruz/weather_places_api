<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getPlaces(Request $request)
    {
        if(isset($request->loc))
        {
            $places = [];

            $weather = $this->getCityWeather($request->loc);

            if($weather->country != "")
            {
                $places = $this->doCitySearch($weather);
            }
            
            if(count($places) > 0)
            {
                return json_encode(
                    array(
                        "is_valid"=>true,
                        "weather"=>view('partial/_weather', compact('weather'))->render(),
                        "places"=>view('partial/_places', compact('places'))->render()
                    )
                );
            }
            else
            {
                return json_encode(
                    array(
                        "is_valid"=>false,
                        "message"=>"Sorry, there is no result for your search."
                    )
                );    
            }
        }
        else
        {
            return json_encode(
                array(
                    "is_valid"=>false,
                    "message"=>"Please select a location."
                )
            );
        }
    }

    private function getCityWeather($city)
    {
        $geolatlon = $this->getLatLon($city);
        $endpoint = "https://api.openweathermap.org/data/2.5/forecast?lat=".$geolatlon->lat.
                    "&lon=".$geolatlon->lon.
                    "&appid=075a293946adeb3c817496d8f7965ed6";

        $apiRequest = array(
            "endpoint"=>$endpoint,
            "isPost"=>false
        );

        $weather = json_decode($this->getAPIResponse((object) $apiRequest));
       
        if(isset($weather->cod))
        {
            if($weather->cod == "200")
            {
                $city = array(
                    "country"=>$weather->city->country,
                    "city"=>$city,
                    "temp"=>$this->kelvinToCelcius($weather->list[0]->main->temp),
                    "weather"=>$weather->list[0]->weather[0]->main
                );

                return (object) $city;
            }   
        }

        return (object) array(
            "country"=>"",
            "city"=>"",
            "temp"=>0,
            "weather"=>""
        );
    }

    private function doCitySearch($loc)
    {
        $apiKey = "fsq3IczgQL3NTvEkqyl8w82/PGMYAkp0TaOx85y3opJ4v7w=";
        $endpoint = "https://api.foursquare.com/v3/places/search?near=".$loc->city."%2C".$loc->country;

        $apiRequest = array(
            "endpoint"=>$endpoint,
            "isPost"=>false,
            "auth"=>$apiKey,
            "accept"=>"application/json"
        );

        $places = json_decode($this->getAPIResponse((object) $apiRequest));
        return $places->results;
    }

    private function getAPIResponse($apiRequest)
    {
        $http_header = array( 
			"Content-Type: Application/Json"
		);

        if(isset($apiRequest->auth))
        {
            array_push($http_header, "Authorization: " . $apiRequest->auth);
        }

        if(isset($apiRequest->accept))
        {
            array_push($http_header, "Accept: ". $apiRequest->accept);
        }

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
		curl_setopt($ch, CURLOPT_URL, $apiRequest->endpoint );

        if($apiRequest->isPost)
        {
		    curl_setopt($ch, CURLOPT_POST, 1);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiRequest->data) );
        }

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);

        return $response;
    }

    private function getLatLon($city)
    {
       $latlon = array();
       if($city == "Tokyo")
       {
           $latlon =  array(
               "lat"=>35.6762,
               "lon"=>139.6503
           );
       }
       if($city == "Kyoto")
       {
           $latlon =  array(
               "lat"=>35.0116,
               "lon"=>135.7681
           );
       }
       if($city == "Sapporo")
       {
           $latlon =  array(
               "lat"=>43.0618,
               "lon"=>141.3545
           );
       }
       if($city == "Osaka")
       {
           $latlon =  array(
               "lat"=>34.6937,
               "lon"=>135.5023
           );
       }
       if($city == "Yokohama")
       {
           $latlon =  array(
               "lat"=>35.4437,
               "lon"=>139.6380
           );
       }
       if($city == "Nagoya")
       {
           $latlon =  array(
               "lat"=>35.1815,
               "lon"=>136.9066
           );
       }

       return (object) $latlon;
    }

    private function kelvinToCelcius($temp)
    {
        return round($temp - 273.15, 0);
    }
}
