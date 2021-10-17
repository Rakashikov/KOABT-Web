<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActorsChangeInformation
 * 
 * @property Carbon $DataAndTime
 * @property string $User
 * @property string $Changed Value
 * @property string $Old Value
 *
 * @package App\Models
 */
class ActorsChangeInformation extends Model
{
	protected $table = 'actors_change_information';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'DataAndTime'
	];

	protected $fillable = [
		'DataAndTime',
		'User',
		'Changed Value',
		'Old Value'
	];
}
