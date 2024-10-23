<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PhysicalPerson
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property Carbon $birth_date
 * @property string $passport_series
 * @property string $passport_number
 * @property string $inn
 * @property string $snils
 * @property string $phone
 * @property string $email
 * @property Collection|LegalPerson[] $legal_people
 * @package App\Models
 * @property-read int|null $legal_people_count
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson wherePassportNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson wherePassportSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereSnils($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalPerson whereSurname($value)
 * @mixin \Eloquent
 */
class PhysicalPerson extends Model
{
	protected $table = 'physical_persons';
	public $timestamps = false;

	protected $casts = [
		'birth_date' => 'datetime'
	];

	protected $fillable = [
		'surname',
		'name',
		'patronymic',
		'birth_date',
		'passport_series',
		'passport_number',
		'inn',
		'snils',
		'phone',
		'email'
	];

	public function legal_people()
	{
		return $this->hasMany(LegalPerson::class, 'physical_persons_id');
	}
}
