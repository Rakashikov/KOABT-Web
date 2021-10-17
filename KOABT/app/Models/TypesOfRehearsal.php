<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypesOfRehearsal
 * 
 * @property int $ID
 * @property string|null $Name
 * 
 * @property Rehearsal $rehearsal
 *
 * @package App\Models
 */
class TypesOfRehearsal extends Model
{
	protected $table = 'types_of_rehearsals';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];

	public function rehearsal()
	{
		return $this->hasOne(Rehearsal::class, 'Type');
	}
}
