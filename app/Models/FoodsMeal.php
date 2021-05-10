<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FoodsMeal
 * 
 * @property int $id
 * @property int $food_id
 * @property int $meal_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Food $food
 * @property Meal $meal
 *
 * @package App\Models
 */
class FoodsMeal extends Model
{
	protected $table = 'foods_meal';

	protected $casts = [
		'food_id' => 'int',
		'meal_id' => 'int'
	];

	protected $fillable = [
		'food_id',
		'meal_id'
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
