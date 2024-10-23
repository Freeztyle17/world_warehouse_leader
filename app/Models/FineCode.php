<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FineCode
 * 
 * @property int $id
 * @property string $description
 * 
 * @property Collection|Fine[] $fines
 *
 * @package App\Models
 */
class FineCode extends Model
{
	protected $table = 'fine_codes';
	public $timestamps = false;

	protected $fillable = [
		'description'
	];

	public function fines()
	{
		return $this->hasMany(Fine::class);
	}
}
