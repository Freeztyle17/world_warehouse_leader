<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Password
 *
 * @property int $id
 * @property string $password
 * @property Collection|Client[] $clients
 * @package App\Models
 * @property-read int|null $clients_count
 * @method static \Illuminate\Database\Eloquent\Builder|Password newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Password newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Password query()
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password wherePassword($value)
 * @mixin \Eloquent
 */
class Password extends Model
{
	protected $table = 'passwords';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password'
	];

	public function clients()
	{
		return $this->hasMany(Client::class, 'password_reference');
	}
}
