<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypesOfWarehouseDistrict
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|WarehouseDistrict[] $warehouse_districts
 *
 * @package App\Models
 */
class TypesOfWarehouseDistrict extends Model
{
	protected $table = 'types_of_warehouse_districts';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function warehouse_districts()
	{
		return $this->hasMany(WarehouseDistrict::class, 'warehouse_type_id');
	}
}
