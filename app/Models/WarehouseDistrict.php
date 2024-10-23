<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WarehouseDistrict
 * 
 * @property int $id
 * @property int $district_number
 * @property string $address
 * @property int $warehouse_type_id
 * @property int $city_id
 * 
 * @property TypesOfWarehouseDistrict $types_of_warehouse_district
 * @property City $city
 * @property Collection|WarehouseZone[] $warehouse_zones
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class WarehouseDistrict extends Model
{
	protected $table = 'warehouse_districts';
	public $timestamps = false;

	protected $casts = [
		'district_number' => 'int',
		'warehouse_type_id' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'district_number',
		'address',
		'warehouse_type_id',
		'city_id'
	];

	public function types_of_warehouse_district()
	{
		return $this->belongsTo(TypesOfWarehouseDistrict::class, 'warehouse_type_id');
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function warehouse_zones()
	{
		return $this->hasMany(WarehouseZone::class);
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class, 'district_id');
	}
}