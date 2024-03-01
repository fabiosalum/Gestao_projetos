<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projetos extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function etapas()
    {
        return $this->hasMany(Etapas::class, 'projeto_id', 'id');
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplinas::class, 'disciplinas_projetos', 'projeto_id', 'disciplina_id');
    }

}
