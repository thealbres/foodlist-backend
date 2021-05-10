<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\FoodGroup;
use App\Models\Meal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Food
 * 
 * @property int $id
 * @property string $name
 * @property string $quantity
 * @property string $calories
 * @property int $user_id
 * @property int $food_group_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property FoodGroup $food_group
 * @property User $user
 * @property Collection|Meal[] $meals
 *
 * @package App\Models\Base
 */
class Food extends Model
{
	use SoftDeletes;
	protected $table = 'foods';

	protected $casts = [
		'user_id' => 'int',
		'food_group_id' => 'int'
	];

	public function food_group()
	{
		return $this->belongsTo(FoodGroup::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function meals()
	{
		return $this->belongsToMany(Meal::class, 'foods_meal')
					->withPivot('id')
					->withTimestamps();
	}
}
