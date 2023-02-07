<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\IController;
use App\Http\Traits\SwapiApi;

class PlanetsController extends Controller implements IController
{
     use SwapiApi;

    private $url;
    private $type;

    public function __construct() {
        $this->type = 'planets';
        $this->url = env('API_SWAPI').$this->type;
        $this->middleware('auth:sanctum');
    }

    public function getAll(Request $request) {
        $limit = $request->query('limit') ?? 10;
        $offset = $request->query('offset') ?? 0;

        $results = $this->swapiGetAll($this->url, $limit, $offset);

        return response()->json($results);
    }

    public function getById($id) {
        $found_item = $this->swapiGetById($this->url, $id);

        return response()->json($found_item);
    }
}
