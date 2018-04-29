<?php

namespace App\Http\Controllers;

use App\Http\Services\Elasticsearch\ElasticsearchClientService;
use Illuminate\Http\Request;
use Uuid;


class ClientController extends Controller
{


    protected $clientService;


    public function __construct(ElasticsearchClientService $clientService)
    {

        $this->clientService = $clientService->client();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        echo "\n\n\ Documento cadastrado";

        $params = [
            "scroll" => "30s",          // how long between scroll requests. should be small!
            "size" => 2,               // how many results *per shard* you want back
            //"index" => "my_index",
            "body" => [
                "query" => [
                    "function_score" => [
                        "query" => [
                            "match_all" => new \stdClass()
                        ],
                        "random_score" => new \stdClass()
                    ]
                ]

            ]
        ];
        $response = $this->clientService->search($params);


        dump($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $random = Uuid::generate();

        $index = "store-" . $random;
        $type = "products-" . $random;


        $params = [
            'index' => $index,
            'type' => $type,
            'body' => ['testField' => 'abc']
        ];


        $response = $this->clientService->index($params);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
