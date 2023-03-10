<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ZipCodeController extends Controller
{
    public function getZipCode($zip_code): JsonResponse
    {
        $codes = Code::where('d_codigo', $zip_code)->get();
        if ($codes) {
            $settlements = array();
            //
            $locality = '';
            // federal entiy info
            $federal_entity_key = 0;
            $federal_entity_code = 0;
            $federal_entity_name = '';
            // municipality info
            $municipality_key = 0;
            $municipality_name = '';
            //
            $head_filled = false;
            // loop zip code list
            foreach ($codes as $code) {
                //
                if (! $head_filled) {
                    $locality = strtoupper(Str::ascii($code['d_ciudad']));
                    //
                    $federal_entity_key = (int) $code['c_estado'];
                    $federal_entity_name = strtoupper(Str::ascii($code['d_estado']));
                    $federal_entity_code = ! $code['c_cp'] ? null : $code['c_cp'];
                    //
                    $municipality_key = (int) $code['c_mnpio'];
                    $municipality_name = strtoupper(Str::ascii($code['d_mnpio']));
                    $head_filled = true;
                }
                //
                $settlement_key = (int) $code['id_asenta_cpcons'];
                $settlement_name = strtoupper(Str::ascii($code['d_asenta']));
                $settlement_zone_type = strtoupper(Str::ascii($code['d_zona']));
                $settlement_type_name = $code['d_tipo_asenta'];
                //
                $settlements[] = array(
                    "key" => $settlement_key,
                    "name" => $settlement_name,
                    "zone_type" => $settlement_zone_type,
                    "settlement_type" => array(
                        "name" => $settlement_type_name
                    )
                );
            }
            //
            $federal_entity = array(
                "key" => $federal_entity_key,
                "name" => $federal_entity_name,
                "code" => $federal_entity_code
            );
            //
            $municipality = array(
                "key" => $municipality_key,
                "name" => $municipality_name
            );
            //
            $results = [
                "zip_code" => $zip_code,
                "locality" => $locality,
                "federal_entity" => $federal_entity,
                "settlements" => $settlements,
                "municipality" => $municipality
            ];
        } else {
            $results = $this->errorResponse();
        }
        return Response::json($results);

    }

    /**
     * @return string[]
     */
    private function errorResponse() {
        return [
            'error' => 'Zip code not found'
        ];
    }
}

