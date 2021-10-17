<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administration
 * 
 * @property int $ID
 * @property int $Position
 * @property string $First name
 * @property string|null $Middle name
 * @property string $Last name
 * @property string|null $Phone
 * @property string|null $e-mail
 * 
 * @property AdministrativePosition $administrative_position
 *
 * @package App\Models
 */
class Administration extends Model
{
	protected $table = 'administrations';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Position' => 'int'
	];

	protected $fillable = [
		'Position',
		'First name',
		'Middle name',
		'Last name',
		'Phone',
		'e-mail'
	];

	public function administrative_position()
	{
		return $this->belongsTo(AdministrativePosition::class, 'Position');
	}
}
