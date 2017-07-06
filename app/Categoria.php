<?php

namespace SistemaCV;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';
    protected $primaryKey='idcategoria';
    protected $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'descripcion',
    	'visibilidad'
    ];

    protected $guarded=[];
}
