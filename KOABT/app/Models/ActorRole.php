<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActorRole
 * 
 * @property int $ID
 * @property int $Role ID
 * @property int $Actor ID
 * 
 * @property Actor $actor
 * @property Role $role
 * @property Cast $cast
 *
 * @package App\Models
 */
class ActorRole extends Model
{
	protected $table = 'actor_roles';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Role ID' => 'int',
		'Actor ID' => 'int'
	];

	protected $fillable = [
		'Role ID',
		'Actor ID'
	];

	public function actor()
	{
		return $this->belongsTo(Actor::class, 'Actor ID');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'Role ID');
	}

	public function cast()
	{
		return $this->hasOne(Cast::class, 'Aroles ID');
	}
}
