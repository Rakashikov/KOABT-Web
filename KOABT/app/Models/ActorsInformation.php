<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActorsInformation
 * 
 * @property string $First Name
 * @property string|null $Middle Name
 * @property string $Last Name
 * @property string $Troupe
 * @property string $position
 * @property string $Title
 * @property string $Character Name
 *
 * @package App\Models
 */
class ActorsInformation extends Model
{
	protected $table = 'actors information';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'First Name',
		'Middle Name',
		'Last Name',
		'Troupe',
		'position',
		'Title',
		'Character Name'
	];
}
