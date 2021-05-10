<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Food;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Meal
 * 
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 * @property Collection|Food[] $food
 *
 * @package App\Models\Base
 */
class Meal extends Model
{
	use SoftDeletes;
	protected $table = 'meals';

	protected $casts = [
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function food()
	{
		return $this->belongsToMany(Food::class, 'foods_meal')
					->withPivot('id')
					->withTimestamps();
	}
}
