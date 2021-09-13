<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
 
class Geolocation extends Controller
{
	
	public function index()
	{
		$address = "Mumabi India";
		$array  = $this->get_longitude_latitude_from_adress($address);
		$latitude  = round($array['lat'], 6);
		$longitude = round($array['long'], 6);
		echo "Latitude: ".$latitude; echo "<br/>";
		echo "Longitude: ".$longitude;
	}
	 
	function get_longitude_latitude_from_adress($address){
	  
		$lat =  0;
		$long = 0;

		$address = str_replace(',,', ',', $address);
		$address = str_replace(', ,', ',', $address);

		$address = str_replace(" ", "+", $address);
		try {
			$json = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$address.'&key=your_api_key');
			$json1 = json_decode($json);

			if($json1->{'status'} == 'ZERO_RESULTS') {
				return [
					'lat' => 0,
					'lng' => 0
				];
			}
			 
			if(isset($json1->results)){	
				$lat = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'});
				$long = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'});
			}
		} catch(exception $e) { }
		return [
			'lat' => $lat,
			'lng' => $long
		];
	}

 
}

?>