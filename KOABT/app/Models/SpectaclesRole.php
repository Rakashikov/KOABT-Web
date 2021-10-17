<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectaclesRole
 * 
 * @property int $Spectacle ID
 * @property int $Role ID
 * 
 * @property Role $role
 * @property Event $event
 *
 * @package App\Models
 */
class SpectaclesRole extends Model
{
	protected $table = 'spectacles_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Spectacle ID' => 'int',
		'Role ID' => 'int'
	];

	protected $fillable = [
		'Spectacle ID',
		'Role ID'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'Role ID');
	}

	public function event()
	{
		return $this->belongsTo(Event::class, 'Spectacle ID');
	}
}
