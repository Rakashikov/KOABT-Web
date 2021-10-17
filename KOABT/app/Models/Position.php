<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * 
 * @property int $ID
 * @property string $Name
 * 
 * @property Collection|Actor[] $actors
 *
 * @package App\Models
 */
class Position extends Model
{
	protected $table = 'positions';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];

	public function actors()
	{
		return $this->hasMany(Actor::class, 'Position ID');
	}
}
