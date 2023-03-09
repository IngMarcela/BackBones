<?php

namespace App\Console\Commands;

use App\Models\Code;
use Illuminate\Console\Command;

class LoadCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload a zip codes file';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(): void
    {

        $filePath =  storage_path('app/CPdescarga2.csv');
        $file = fopen($filePath, 'r');

        while (($data = fgetcsv($file, 0, ';')) !== false) {
            $cleanData = array_map('trim', $data);
            $cleanData[] = 'd_codigo';
            $cleanData[] = 'd_asenta';
            $cleanData[] = 'd_tipo_asenta';
            $cleanData[] = 'D_mnpio';
            $cleanData[] = 'd_estado';
            $cleanData[] = 'd_ciudad';
            $cleanData[] = 'd_CP';
            $cleanData[] = 'c_estado';
            $cleanData[] = 'c_oficina';
            $cleanData[] = 'c_CP';
            $cleanData[] = 'c_tipo_asenta';
            $cleanData[] = 'c_mnpio';
            $cleanData[] = 'id_asenta_cpcons';
            $cleanData[] = 'd_zona';
            $cleanData[] = 'c_cve_ciudad';

            if ($cleanData[0] != null){
                Code::create([
                    'd_codigo' => $cleanData[0],
                    'd_asenta' => $cleanData[1],
                    'd_tipo_asenta' => $cleanData[2],
                    'd_mnpio' => $cleanData[3],
                    'd_estado' => $cleanData[4],
                    'd_ciudad' => $cleanData[5],
                    'd_cp' => $cleanData[6],
                    'c_estado' => $cleanData[7],
                    'c_oficina' => $cleanData[8],
                    'c_cp' => $cleanData[9],
                    'c_tipo_asneta' => $cleanData[10],
                    'c_mnpio' => $cleanData[11],
                    'id_asenta_cpcons' => $cleanData[12],
                    'd_zona' => $cleanData[13],
                    'c_cve_ciudad' => $cleanData[14],
                ]);
            }

        }

        fclose($file);
        $this->info('Import complete');

    }
}
