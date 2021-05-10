<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Food;
use App\Models\FoodGroup;
use App\Models\Goal;
use App\Models\Meal;
use App\Models\UserProgress;
use App\Models\WaterProgress;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $birthday
 * @property string $password
 * @property string $height
 * @property string $type
 * @property string $gender
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|FoodGroup[] $food_groups
 * @property Collection|Food[] $food
 * @property Collection|Goal[] $goals
 * @property Collection|Meal[] $meals
 * @property Collection|UserProgress[] $user_progresses
 * @property Collection|WaterProgress[] $water_progresses
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'birthday'
	];

	public function food_groups()
	{
		return $this->hasMany(FoodGroup::class);
	}

	public function food()
	{
		return $this->hasMany(Food::class);
	}

	public function goals()
	{
		return $this->hasMany(Goal::class);
	}

	public function meals()
	{
		return $this->hasMany(Meal::class);
	}

	public function user_progresses()
	{
		return $this->hasMany(UserProgress::class);
	}

	public function water_progresses()
	{
		return $this->hasMany(WaterProgress::class);
	}
}
