<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * 
 * @property int $id
 * @property int $district_id
 * @property int $zone_id
 * @property int $warehouse_id
 * @property int $section_id
 * @property Carbon $start_date_of_reservation
 * @property Carbon $end_date_of_reservation
 * 
 * @property WarehouseDistrict $warehouse_district
 * @property WarehouseZone $warehouse_zone
 * @property Warehouse $warehouse
 * @property Section $section
 * @property Collection|Operation[] $operations
 *
 * @package App\Models
 */
class Reservation extends Model
{
	protected $table = 'reservation';
	public $timestamps = false;

	protected $casts = [
		'district_id' => 'int',
		'zone_id' => 'int',
		'warehouse_id' => 'int',
		'section_id' => 'int',
		'start_date_of_reservation' => 'datetime',
		'end_date_of_reservation' => 'datetime'
	];

	protected $fillable = [
		'district_id',
		'zone_id',
		'warehouse_id',
		'section_id',
		'start_date_of_reservation',
		'end_date_of_reservation'
	];

	public function warehouse_district()
	{
		return $this->belongsTo(WarehouseDistrict::class, 'district_id');
	}

	public function warehouse_zone()
	{
		return $this->belongsTo(WarehouseZone::class, 'zone_id');
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}

	public function section()
	{
		return $this->belongsTo(Section::class);
	}

	public function operations()
	{
		return $this->hasMany(Operation::class);
	}
}
