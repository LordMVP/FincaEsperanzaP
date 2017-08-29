<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
	protected $table = 'cuentas';

	protected $primaryKey = 'num_compro';

	protected $fillable = ['num_compro', 'num_cuenta', 'descripcion', 'saldo', 'naturaleza', 'fecha_operacion'];

	//protected $hidden = ['password', 'remember_token'];

	public function scopeSearch($query, $busqueda){
		//dd($busqueda);
		return $query->where('num_compro', 'LIKE', $busqueda);
	}
}
