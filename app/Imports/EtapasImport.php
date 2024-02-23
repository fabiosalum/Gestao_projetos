<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Etapas;
use Maatwebsite\Excel\Row;

class EtapasImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $row)
    {
        return new Etapas([
            'projeto_id' => $row[0],
            'nome' => $row[1],
            'data_entrega' => $row[2],
            'data_inicio' => $row[3],
            // Adicione mais campos conforme necessário
        ]);
    }
}
