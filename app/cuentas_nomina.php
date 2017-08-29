<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class cuentas_nomina extends Model
{
	protected $table = 'cuentas_nomina';
	public $timestamps = false;
	protected $primaryKey = 'id';

	protected $fillable = ['num_cuenta', 'naturaleza', 'saldo', 'descripcion', 'fecha'];	


}
