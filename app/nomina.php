<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class nomina extends Model
{
	protected $table = 'nomina1';
	public $timestamps = false;
	protected $primaryKey = 'id_nomina';

	protected $fillable = ['cedula', 'sueldo', 'sueldobasico', 'horash', 'transporte', 'comisiones', 'bonificaciones', 'devengado', 'salud', 'pension', 'riesgos', 'rtefuente', 'libranza', 'fondos', 'embargos', 'caja', 'icbf', 'sena', 'cesantias', 'intecesantias', 'primaservi', 'vacaciones', 'deducido', 'total', 'fecha', 'estado'];	



	public function scopeSearch($query, $busqueda){
		//dd($busqueda);
		return $query->where('cedula', 'LIKE', $busqueda);
	}
}
