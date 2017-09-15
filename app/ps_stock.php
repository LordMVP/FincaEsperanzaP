<?php

namespace FincaEsperanza;

use Illuminate\Database\Eloquent\Model;

class ps_stock extends Model
{
	protected $table = 'ps_stock';

	protected $primaryKey = 'id_stock';

	protected $fillable = ['id_stock', 'id_product', 'physical_quantity', 'usable_quantity', 'price_te'];
}
