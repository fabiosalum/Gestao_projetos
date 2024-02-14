<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processos extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function etapas()
    {
        return $this->belongsTo(Etapas::class, 'etapa_id', 'id');
    }

    public function disciplinas()
    {
        return $this->belongsTo(disciplinas::class, 'disciplina_id', 'id');
    }
}
