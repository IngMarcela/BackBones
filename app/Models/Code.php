<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;
    protected $fillable = [
        'd_codigo',
        'd_asenta',
        'd_tipo_asenta',
        'd_mnpio',
        'd_estado',
        'd_ciudad',
        'd_cp',
        'c_estado',
        'c_oficina',
        'c_cp',
        'c_tipo_asneta',
        'c_mnpio',
        'id_asenta_cpcons',
        'd_zona',
        'c_cve_ciudad',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
