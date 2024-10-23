<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * 
 * @property int $id
 * @property int $warehouse_id
 * @property int $section_number
 * @property bool $status
 * 
 * @property Warehouse $warehouse
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class Section extends Model
{
	protected $table = 'sections';
	public $timestamps = false;

	protected $casts = [
		'warehouse_id' => 'int',
		'section_number' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'warehouse_id',
		'section_number',
		'status'
	];

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class);
	}
}
