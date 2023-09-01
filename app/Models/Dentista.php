<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    
    protected $fillable = ['name', 'email', 'cro', 'cro_uf'];

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'dentistas_especialidades', 'dentista_id', 'especialidade_id');
    }
    

    
}
