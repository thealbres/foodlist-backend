<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Meal
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Food[] $food
 *
 * @package App\Models
 */
class Meal extends Model
{
	use SoftDeletes;

	protected $table = 'meals';

	protected $fillable = [
		'user_id',
	];

	public function food()
	{
		return $this->belongsToMany(Food::class, 'foods_meal')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
