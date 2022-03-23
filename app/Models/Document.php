<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'doc_documento';
    public $timestamps = false;
    protected $fillable = ['DOC_ID','DOC_NOMBRE', 'DOC_CODIGO', 'DOC_CONTENIDO', 'DOC_ID_TIPO', 'DOC_ID_PROCESO'];

    public function tipo()
    {
        return $this->belongsTo(Tipos::class, 'DOC_ID_TIPO', 'TIP_ID');
    }

    public function proceso()
    {
        return $this->belongsTo('App\Models\Procesos', 'DOC_ID_PROCESO', 'PRO_ID');
    }

    //Scopes
    public function scopeBuscarTipo($query, $serach) {
    	if ($serach) {
    		return $query->where('DOC_ID_TIPO',$serach);
    	}
    }

    public function scopeProceso($query, $proceso) {
    	if ($proceso) {
    		return $query->where('DOC_ID_PROCESO',$proceso);
    	}
    }

    public function scopeBuscar($query, $search) {
    	if ($search) {
    		return $query->where('DOC_NOMBRE','like',"%$search%")
                    ->orWhere('DOC_CODIGO','like',"%$search%")
                    ->orWhere('DOC_CONTENIDO','like',"%$search%");
    	}
    }

}
