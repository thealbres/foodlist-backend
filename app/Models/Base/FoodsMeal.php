<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Food;
use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FoodsMeal
 * 
 * @property int $id
 * @property int $food_id
 * @property int $meal_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Food $food
 * @property Meal $meal
 *
 * @package App\Models\Base
 */
class FoodsMeal extends Model
{
	protected $table = 'foods_meal';

	protected $casts = [
		'food_id' => 'int',
		'meal_id' => 'int'
	];

	public function food()
	{
		return $this->belongsTo(Food::class);
	}

	public function meal()
	{
		return $this->belongsTo(Meal::class);
	}
}
