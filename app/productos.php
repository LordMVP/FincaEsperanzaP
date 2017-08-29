<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
	protected $table = 'ps_product';
	public $timestamps = false;
	protected $primaryKey = 'id_product';

	protected $fillable = ['id_product', 'idcategoria', 'ean13', 'quantity', 'minimal_quantity', 'price', 'wholesale_price', 'tamano', 'active', 'date_add', 'date_upd'];	

}
