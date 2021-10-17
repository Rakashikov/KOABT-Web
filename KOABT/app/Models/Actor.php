<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Actor
 * 
 * @property int $Actor ID
 * @property int|null $Troupe ID
 * @property int|null $Position ID
 * @property string $Last Name
 * @property string $First Name
 * @property string|null $Middle Name
 * @property string|null $Discription
 * 
 * @property Position|null $position
 * @property Troupe|null $troupe
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Actor extends Model
{
	protected $table = 'actors';
	protected $primaryKey = 'Actor ID';
	public $timestamps = false;

	protected $casts = [
		'Troupe ID' => 'int',
		'Position ID' => 'int'
	];

	protected $fillable = [
		'Troupe ID',
		'Position ID',
		'Last Name',
		'First Name',
		'Middle Name',
		'Discription'
	];

	public function position()
	{
		return $this->belongsTo(Position::class, 'Position ID');
	}

	public function troupe()
	{
		return $this->belongsTo(Troupe::class, 'Troupe ID');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'actor_roles', 'Actor ID', 'Role ID')
					->withPivot('ID');
	}
}
