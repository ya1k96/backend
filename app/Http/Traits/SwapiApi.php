<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait SwapiApi {
    public function swapiGetAll($url, $limit, $offset) {
        $response = Http::get($url);
        $results = $response['results'];

        //Por razones practicas sumamos ambos para despues descontar el offset
        while(count($results) < ($limit + $offset)) {
            $request_api = Http::get($response['next']);
            $results = array_merge($results, $request_api['results']);
        }

        return array_slice($results, $offset, $limit);
    }

    public function swapiGetById($url, $id) {
        $found_item = null;
        $response = Http::get($url);

        // Este while solo esta como control
        do {
            //Simplemente tratamos de buscar el id correcto, pero este se encuentra dentro de la url
            for ($i=0; $i < count($response['results']); $i++) {
                $item = $response['results'][$i];
                $uri = explode('/', $response['results'][$i]['url']);
                $id_uri = (int) $uri[5]; //Donde se encuentra el id

                if($id_uri == $id) {
                    $found_item = $item;
                    break;
                }
            }

            if(is_null($response['next'])) {
                return response()->json(["message" => "Not found"]);
            }

            $response = Http::get($response['next']);
        } while(is_null($found_item));

        return $found_item;
    }
}
