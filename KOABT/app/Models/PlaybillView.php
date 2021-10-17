<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlaybillView
 * 
 * @property Carbon $Date
 * @property string $Title
 * @property Carbon $Duration
 * @property string $Character Name
 * @property string $First Name
 * @property string $Last Name
 *
 * @package App\Models
 */
class PlaybillView extends Model
{
	protected $table = 'playbill view';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'Date',
		'Duration'
	];

	protected $fillable = [
		'Date',
		'Title',
		'Duration',
		'Character Name',
		'First Name',
		'Last Name'
	];
}
