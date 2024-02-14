<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function etapas()
    {
        return $this->hasMany(Etapas::class, 'projeto_id', 'id');
    }

}
