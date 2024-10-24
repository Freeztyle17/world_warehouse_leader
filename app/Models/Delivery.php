<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 *
 * @property int $id
 * @property int $transport_id
 * @property Carbon $start_delivery_date
 * @property Carbon $end_delivery_date
 * @property bool $status
 * @property Transport $transport
 * @property Collection|Operation[] $operations
 * @package App\Models
 * @property-read int|null $operations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereEndDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereStartDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereTransportId($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
	protected $table = 'delivery';
	public $timestamps = false;

	protected $casts = [
		'transport_id' => 'int',
		'start_delivery_date' => 'datetime',
		'end_delivery_date' => 'datetime',
		'status' => 'bool'
	];

	protected $fillable = [
		'transport_id',
		'start_delivery_date',
		'end_delivery_date',
		'status'
	];

	public function transport()
	{
		return $this->belongsTo(Transport::class);
	}

	public function operations()
	{
		return $this->hasMany(Operation::class);
	}
}
