<?php


namespace App\Http\Services\Elasticsearch;

use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Config;


class ElasticsearchClientService
{

    public function client()
    {

        $hosts =  Config::get('elasticsearch');

        $clientBuilder = ClientBuilder::create();   // Instantiate a new ClientBuilder
        $clientBuilder->setHosts($hosts);           // Set the hosts
        return $clientBuilder->build();


    }

}
