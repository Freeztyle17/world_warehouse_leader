<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WarehouseZone
 *
 * @property int $id
 * @property int $warehouse_district_id
 * @property int $zone_number
 * @property WarehouseDistrict $warehouse_district
 * @property Collection|Warehouse[] $warehouses
 * @property Collection|Reservation[] $reservations
 * @package App\Models
 * @property-read int|null $reservations_count
 * @property-read int|null $warehouses_count
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone whereWarehouseDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarehouseZone whereZoneNumber($value)
 * @mixin \Eloquent
 */
class WarehouseZone extends Model
{
	protected $table = 'warehouse_zones';
	public $timestamps = false;

	protected $casts = [
		'warehouse_district_id' => 'int',
		'zone_number' => 'int'
	];

	protected $fillable = [
		'warehouse_district_id',
		'zone_number'
	];

	public function warehouse_district()
	{
		return $this->belongsTo(WarehouseDistrict::class);
	}

	public function warehouses()
	{
		return $this->hasMany(Warehouse::class, 'zone_id');
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class, 'zone_id');
	}
}
