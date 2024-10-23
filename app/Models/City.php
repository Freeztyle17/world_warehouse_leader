<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @property int $id
 * @property string $name
 * @property Collection|WarehouseDistrict[] $warehouse_districts
 * @package App\Models
 * @property-read int|null $warehouse_districts_count
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @mixin \Eloquent
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function warehouse_districts()
	{
		return $this->hasMany(WarehouseDistrict::class);
	}
}
