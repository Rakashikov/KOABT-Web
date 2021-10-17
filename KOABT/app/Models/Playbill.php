<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Playbill
 * 
 * @property Carbon $DateAndTime
 * @property int $Event ID
 * @property int|null $Cast ID
 * 
 * @property Cast|null $cast
 * @property Event $event
 *
 * @package App\Models
 */
class Playbill extends Model
{
	protected $table = 'playbill';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Event ID' => 'int',
		'Cast ID' => 'int'
	];

	protected $dates = [
		'DateAndTime'
	];

	protected $fillable = [
		'DateAndTime',
		'Event ID',
		'Cast ID'
	];

	public function cast()
	{
		return $this->belongsTo(Cast::class, 'Cast ID', 'ID');
	}

	public function event()
	{
		return $this->belongsTo(Event::class, 'Event ID');
	}
}
