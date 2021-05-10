<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Goal
 * 
 * @property int $id
 * @property int $user_id
 * @property string $height
 * @property string $imc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Goal extends Model
{
	use SoftDeletes;
	protected $table = 'goals';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'height',
		'imc'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
