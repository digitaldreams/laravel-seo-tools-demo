<?php
/**
 * Created by PhpStorm.
 * User: Tuhin
 * Date: 3/12/2019
 * Time: 7:47 PM
 */

namespace App\Services;


use GuzzleHttp\Client;

class HereGeocoding
{
    private $lat;
    private $lng;

    private $address;
    /**
     * @var
     */
    protected $response;
    /**
     * @var
     */
    protected $client;

    protected $data = [];

    /**
     * HereGeocoding constructor.
     * @param $address
     */
    public function __construct($address)
    {
        $this->address = $address;
        $this->client = new Client();
    }

    public function fetch()
    {
        $response = $this->client->request('GET', 'https://geocoder.api.here.com/6.2/geocode.json', ['query' => [
            'searchtext' => $this->address,
            'maxresults' => 1,
            'app_id' => env('HERE_APP_ID'),
            'app_code' => env('HERE_APP_CODE')
        ]]);
        $this->response = json_decode($response->getBody()->getContents(), true);
        $this->parse();
        return $this;
    }

    public function response()
    {
        return $this->response;
    }

    /**
     * @return array
     */
    private function parse()
    {
        $response = $this->response['Response']['View'][0]['Result'][0] ?? [];
        if (isset($response['Location'])) {
            $location = $response['Location'];
            $this->data['place_id'] = $location['LocationId'] ?? null;
            $this->data['latitude']=$location['DisplayPosition']['Latitude']??null;
            $this->data['longitude']=$location['DisplayPosition']['Longitude']??null;
            $this->data['address'] = $location['Address']['Street'] ?? null;
            $this->data['postcode'] = $location['Address']['PostalCode'] ?? null;
            $this->data['locality'] = $location['Address']['District'] ?? null;
            $this->data['city'] = $location['Address']['City'] ?? null;
            $this->data['state'] = $location['Address']['State'] ?? null;
            $this->data['country'] = $location['Address']['Country'] ?? null;
        }
        return $this->data;
    }

    public function toArray()
    {
        return $this->data;
    }
}