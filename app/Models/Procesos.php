<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    use HasFactory;

    protected $table = 'pro_proceso';
    protected $fillable = ['PRO_ID', 'PRO_NOMBRE', 'PRO_PREFIJO'];

    public function documentos()
    {
        return $this->belongsToMany(Document::class, 'pro_proceso', 'DOC_ID_PROCESO', 'PRO_ID');
    }
}
