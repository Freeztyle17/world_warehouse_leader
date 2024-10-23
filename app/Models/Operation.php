<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operation
 *
 * @property int $id
 * @property int $reservation_id
 * @property int|null $delivery_id
 * @property int $payment_id
 * @property int $client_id
 * @property Reservation $reservation
 * @property Delivery|null $delivery
 * @property Payment $payment
 * @property Client $client
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Operation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operation whereReservationId($value)
 * @mixin \Eloquent
 */
class Operation extends Model
{
	protected $table = 'operation';
	public $timestamps = false;

	protected $casts = [
		'reservation_id' => 'int',
		'delivery_id' => 'int',
		'payment_id' => 'int',
		'client_id' => 'int'
	];

	protected $fillable = [
		'reservation_id',
		'delivery_id',
		'payment_id',
		'client_id'
	];

	public function reservation()
	{
		return $this->belongsTo(Reservation::class);
	}

	public function delivery()
	{
		return $this->belongsTo(Delivery::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}
}
