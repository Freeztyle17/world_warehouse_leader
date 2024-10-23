<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LegalPerson
 * 
 * @property int $client_id
 * @property string $client_full_name
 * @property string $client_short_name
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 * @property int $physical_persons_id
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $status
 * @property int $okved_code_id
 * 
 * @property PhysicalPerson $physical_person
 * @property OkvedCode $okved_code
 *
 * @package App\Models
 */
class LegalPerson extends Model
{
	protected $table = 'legal_persons';
	protected $primaryKey = 'client_id';
	public $timestamps = false;

	protected $casts = [
		'physical_persons_id' => 'int',
		'okved_code_id' => 'int'
	];

	protected $fillable = [
		'client_full_name',
		'client_short_name',
		'inn',
		'kpp',
		'ogrn',
		'physical_persons_id',
		'phone',
		'email',
		'address',
		'status',
		'okved_code_id'
	];

	public function physical_person()
	{
		return $this->belongsTo(PhysicalPerson::class, 'physical_persons_id');
	}

	public function okved_code()
	{
		return $this->belongsTo(OkvedCode::class);
	}
}
