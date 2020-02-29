<?php

namespace Whatspie;

use GuzzleHttp\RequestOptions;

class Client
{
    const URL = 'https://app.whatspie.com';
    private $apiToken;
    private $device;
    private $httpClient;
    private $message;
    private $to;

    public function __construct($apiToken, $device)
    {
        $this->apiToken = $apiToken;
        $this->device = $device;
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => self::URL,
            'defaults' => [
                'headers' => ['Accept' => 'application/json',  'Authorization' => "Bearer {$this->apiToken}"],
            ]
        ]);
    }

    public function to($number)
    {
        $this->to = $number;
        return $this;
    }

    public function message($message)
    {
        $this->message = $message;
        return $this;
    }

    public function send()
    {
        $request = $this->httpClient->post('/api/messages', [
            RequestOptions::HEADERS => ['Accept' => 'application/json',  'Authorization' => "Bearer {$this->apiToken}"],
            RequestOptions::JSON => [
                'receiver' => $this->to,
                'device' => $this->device,
                'message' => $this->message
            ],
            RequestOptions::HTTP_ERRORS => false,
        ]);

        return ($request->getStatusCode() === 200) ? true : false;
    }

    public function getMessages()
    {
        $request = $this->httpClient->get('/api/messages?device='.$this->device, [
            RequestOptions::HEADERS => ['Accept' => 'application/json',  'Authorization' => "Bearer {$this->apiToken}"],
            RequestOptions::HTTP_ERRORS => false,
        ]);
        $json = (string) $request->getBody();

        return json_decode($json);
    }
}