<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rehearsal
 * 
 * @property Carbon $DateAndTime
 * @property int $Type
 * @property int $Troupe
 * @property int $Actors IDs
 * 
 * @property Cast $cast
 * @property Troupe $troupe
 * @property TypesOfRehearsal $types_of_rehearsal
 *
 * @package App\Models
 */
class Rehearsal extends Model
{
	protected $table = 'rehearsals';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Type' => 'int',
		'Troupe' => 'int',
		'Actors IDs' => 'int'
	];

	protected $dates = [
		'DateAndTime'
	];

	protected $fillable = [
		'DateAndTime',
		'Type',
		'Troupe',
		'Actors IDs'
	];

	public function cast()
	{
		return $this->belongsTo(Cast::class, 'Actors IDs', 'ID');
	}

	public function troupe()
	{
		return $this->belongsTo(Troupe::class, 'Troupe');
	}

	public function types_of_rehearsal()
	{
		return $this->belongsTo(TypesOfRehearsal::class, 'Type');
	}
}
