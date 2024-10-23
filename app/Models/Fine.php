<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fine
 *
 * @property int $fine_id
 * @property int $client_id
 * @property string $fine_description
 * @property int $fine_code_id
 * @property Client $client
 * @property FineCode $fine_code
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Fine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fine whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fine whereFineCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fine whereFineDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fine whereFineId($value)
 * @mixin \Eloquent
 */
class Fine extends Model
{
	protected $table = 'fines';
	protected $primaryKey = 'fine_id';
	public $timestamps = false;

	protected $casts = [
		'client_id' => 'int',
		'fine_code_id' => 'int'
	];

	protected $fillable = [
		'client_id',
		'fine_description',
		'fine_code_id'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function fine_code()
	{
		return $this->belongsTo(FineCode::class);
	}
}
