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
 * Class Food
 * 
 * @property int $id
 * @property string $name
 * @property string $quantity
 * @property string $calories
 * @property int $user_id
 * @property int $food_group
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Meal[] $meals
 *
 * @package App\Models
 */
class Food extends Model
{
	use SoftDeletes;
	protected $table = 'foods';

	protected $casts = [
		'user_id' => 'int',
		'food_group_id' => 'int'
	];

	protected $fillable = [
		'name',
		'quantity',
		'calories',
		'user_id',
		'food_group_id'
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
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
