<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
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
 * @property Collection|Transport[] $transports
 * @package App\Models
 * @property-read int|null $transports_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassportNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassportSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSnils($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSurname($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
	protected $table = 'employees';
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

	public function transports()
	{
		return $this->hasMany(Transport::class);
	}
}
