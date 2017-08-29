<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class variables extends Model
{
	protected $table = 'variables';
	public $timestamps = false;
	protected $primaryKey = 'idvariables';

	protected $fillable = ['idvariables', 'variable', 'nombre', 'descripcion'];	


}
