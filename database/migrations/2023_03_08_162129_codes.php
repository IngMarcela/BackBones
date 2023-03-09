<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('d_codigo')->nullable(true);
            $table->string('d_asenta')->nullable(true);;
            $table->string('d_tipo_asenta')->nullable(true);;
            $table->string('d_mnpio')->nullable(true);;
            $table->string('d_estado')->nullable(true);;
            $table->string('d_ciudad')->nullable(true);;
            $table->string('d_cp')->nullable(true);;
            $table->string('c_estado')->nullable(true);;
            $table->string('c_oficina')->nullable(true);;
            $table->string('c_cp')->nullable(true);;
            $table->string('c_tipo_asneta')->nullable(true);;
            $table->string('c_mnpio')->nullable(true);;
            $table->string('id_asenta_cpcons')->nullable(true);;
            $table->string('d_zona')->nullable(true);;
            $table->string('c_cve_ciudad')->nullable(true);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zip_codes');
    }
};
