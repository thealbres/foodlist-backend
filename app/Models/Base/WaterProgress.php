<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WaterProgress
 * 
 * @property int $id
 * @property int $user_id
 * @property string $every_hour
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class WaterProgress extends Model
{
	use SoftDeletes;
	protected $table = 'water_progress';

	protected $casts = [
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
