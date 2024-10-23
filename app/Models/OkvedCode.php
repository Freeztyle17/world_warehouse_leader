<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OkvedCode
 * 
 * @property int $id
 * @property string $code
 * 
 * @property Collection|LegalPerson[] $legal_people
 *
 * @package App\Models
 */
class OkvedCode extends Model
{
	protected $table = 'okved_codes';
	public $timestamps = false;

	protected $fillable = [
		'code'
	];

	public function legal_people()
	{
		return $this->hasMany(LegalPerson::class);
	}
}
