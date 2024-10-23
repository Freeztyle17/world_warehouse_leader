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
 * @property Warehouse $warehouse
 * @property Collection|Reservation[] $reservations
 * @package App\Models
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereSectionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereWarehouseId($value)
 * @mixin \Eloquent
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
