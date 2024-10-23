<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transport
 * 
 * @property int $id
 * @property string $type
 * @property int $employee_id
 * @property bool $availability
 * 
 * @property Employee $employee
 * @property Collection|Delivery[] $deliveries
 *
 * @package App\Models
 */
class Transport extends Model
{
	protected $table = 'transport';
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'availability' => 'bool'
	];

	protected $fillable = [
		'type',
		'employee_id',
		'availability'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function deliveries()
	{
		return $this->hasMany(Delivery::class);
	}
}
