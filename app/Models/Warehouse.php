<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Warehouse
 * 
 * @property int $id
 * @property int $zone_id
 * @property int $warehouse_number
 * 
 * @property WarehouseZone $warehouse_zone
 * @property Collection|Section[] $sections
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class Warehouse extends Model
{
	protected $table = 'warehouses';
	public $timestamps = false;

	protected $casts = [
		'zone_id' => 'int',
		'warehouse_number' => 'int'
	];

	protected $fillable = [
		'zone_id',
		'warehouse_number'
	];

	public function warehouse_zone()
	{
		return $this->belongsTo(WarehouseZone::class, 'zone_id');
	}

	public function sections()
	{
		return $this->hasMany(Section::class);
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class);
	}
}
