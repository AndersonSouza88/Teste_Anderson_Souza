<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $fillable = ['nome'];

    public function dentistas()
    {
        return $this->belongsToMany(Dentista::class, 'dentistas_especialidades', 'especialidade_id', 'dentista_id');
    }
    
}
