<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
	protected $table = 'categorias';
	public $timestamps = false;
	protected $primaryKey = 'idcategoria';

	protected $fillable = ['idcategoria', 'nombre', 'descripcion'];
}
