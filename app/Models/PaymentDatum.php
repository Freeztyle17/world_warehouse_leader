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
 * 
 * @property Client $client
 *
 * @package App\Models
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
