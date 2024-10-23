<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property int $person_id
 * @property string $type
 * @property string $login
 * @property int $password_reference
 * 
 * @property Password $password
 * @property Collection|Fine[] $fines
 * @property Collection|PaymentDatum[] $payment_data
 * @property Collection|Operation[] $operations
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	public $timestamps = false;

	protected $casts = [
		'person_id' => 'int',
		'password_reference' => 'int'
	];

	protected $fillable = [
		'person_id',
		'type',
		'login',
		'password_reference'
	];

	public function password()
	{
		return $this->belongsTo(Password::class, 'password_reference');
	}

	public function fines()
	{
		return $this->hasMany(Fine::class);
	}

	public function payment_data()
	{
		return $this->hasMany(PaymentDatum::class);
	}

	public function operations()
	{
		return $this->hasMany(Operation::class);
	}
}
