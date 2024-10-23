<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentDatum
 *
 * @property int $id
 * @property int $client_id
 * @property string $payment_score
 * @property Client $client
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentDatum wherePaymentScore($value)
 * @mixin \Eloquent
 */
class PaymentDatum extends Model
{
	protected $table = 'payment_data';
	public $timestamps = false;

	protected $casts = [
		'client_id' => 'int'
	];

	protected $fillable = [
		'client_id',
		'payment_score'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
	}
}
