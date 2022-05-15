<?php

namespace AbdulsalamIshaq\Sendbox;

use AbdulsalamIshaq\Sendbox\Client;

class Sendbox
{
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function __call(string $tag, array $argv)
    {
        return $this->client->api($tag);
    }

    public function client()
    {
        return $this->client;
    }
}
