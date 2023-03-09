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
        $code = Code::where('d_codigo', $zip_code)->first();
        if ($code) {
            $settlements = [];
            $locality = strtoupper(Str::ascii($code->d_ciudad));
            $federal_entity = [
                'key' => (int) $code->c_estado,
                'name' => ucwords(Str::ascii($code->d_estado)),
                'code' => $code->c_cp ?: null
            ];
            $municipality = [
                'key' => (int) $code->c_mnpio,
                'name' => ucwords(Str::ascii($code->d_mnpio))
            ];

            $settlements[] = [
                'key' => (int) $code->id_asenta_cpcons,
                'name' => ucwords(Str::ascii($code->d_asenta)),
                'zone_type' => ucwords(Str::ascii($code->d_zona)),
                'settlement_type' => [
                    'name' => ucwords($code->d_tipo_asenta)
                ]
            ];
            $results = [
                'zip_code' => $zip_code,
                'locality' => $locality,
                'federal_entity' => $federal_entity,
                'settlements' => $settlements,
                'municipality' => $municipality
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

