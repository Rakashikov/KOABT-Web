<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Troupe
 * 
 * @property int $ID
 * @property string $Name
 * 
 * @property Collection|Actor[] $actors
 * @property Rehearsal $rehearsal
 *
 * @package App\Models
 */
class Troupe extends Model
{
	protected $table = 'troupes';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];

	public function actors()
	{
		return $this->hasMany(Actor::class, 'Troupe ID');
	}

	public function rehearsal()
	{
		return $this->hasOne(Rehearsal::class, 'Troupe');
	}
}
