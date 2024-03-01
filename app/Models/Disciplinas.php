<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disciplinas extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function projetos()
    {
        return $this->belongsToMany(projetos::class, 'disciplinas_projetos', 'disciplina_id', 'projeto_id');
    }

}
