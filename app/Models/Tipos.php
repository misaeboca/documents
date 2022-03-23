<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

    protected $table = 'tip_tipo_doc';
    protected $fillable = ['TIP_ID', 'TIP_NOMBRE', 'TIP_PREFIJO'];

    public function documentos()
    {
        return $this->belongsToMany('App\Models\Document', 'tip_tipo_doc', 'DOC_ID_TIPO', 'TIP_ID');
    }
}
