<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

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
 * @property Collection|UserProgress[] $user_progresses
 * @property Collection|WaterProgress[] $water_progresses
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject
{
	protected $table = 'users';

	protected $dates = [
		'birthday'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'birthday',
		'password',
		'height',
		'type',
		'gender'
	];
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}


	public function getJWTCustomClaims()
	{
		return [];
	}

	public function getJwtTokenAttribute()
	{
		try {
			return JWTAuth::fromUser($this);
		} catch (\Exception $e) {
			return null;
		}
	}
	
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

	public function user_progresses()
	{
		return $this->hasMany(UserProgress::class);
	}

	public function water_progresses()
	{
		return $this->hasMany(WaterProgress::class);
	}
}
