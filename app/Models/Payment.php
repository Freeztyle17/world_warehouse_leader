<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $id
 * @property bool $status
 * 
 * @property Collection|Operation[] $operations
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payment';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'status'
	];

	public function operations()
	{
		return $this->hasMany(Operation::class);
	}
}
