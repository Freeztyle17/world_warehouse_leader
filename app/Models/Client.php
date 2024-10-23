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
 * @property Password $password
 * @property Collection|Fine[] $fines
 * @property Collection|PaymentDatum[] $payment_data
 * @property Collection|Operation[] $operations
 * @package App\Models
 * @property-read int|null $fines_count
 * @property-read int|null $operations_count
 * @property-read int|null $payment_data_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePasswordReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereType($value)
 * @mixin \Eloquent
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
