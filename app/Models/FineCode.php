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
 * @property Collection|Fine[] $fines
 * @package App\Models
 * @property-read int|null $fines_count
 * @method static \Illuminate\Database\Eloquent\Builder|FineCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FineCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FineCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|FineCode whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FineCode whereId($value)
 * @mixin \Eloquent
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
