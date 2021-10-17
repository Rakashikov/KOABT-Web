<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $Role ID
 * @property string $Character Name
 * 
 * @property Collection|Actor[] $actors
 * @property SpectaclesRole $spectacles_role
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'Role ID';
	public $timestamps = false;

	protected $fillable = [
		'Character Name'
	];

	public function actors()
	{
		return $this->belongsToMany(Actor::class, 'actor_roles', 'Role ID', 'Actor ID')
					->withPivot('ID');
	}

	public function spectacles_role()
	{
		return $this->hasOne(SpectaclesRole::class, 'Role ID');
	}
}
