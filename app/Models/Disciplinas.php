<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function area_con()
    {
        return $this->belongsTo(Areaconhecimento::class, 'areaconhecimento_id', 'id');
    }

}
