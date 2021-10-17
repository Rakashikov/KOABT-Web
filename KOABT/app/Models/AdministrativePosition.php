<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdministrativePosition
 * 
 * @property int $ID
 * @property string $Name
 * 
 * @property Collection|Administration[] $administrations
 *
 * @package App\Models
 */
class AdministrativePosition extends Model
{
	protected $table = 'administrative_positions';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];

	public function administrations()
	{
		return $this->hasMany(Administration::class, 'Position');
	}
}
