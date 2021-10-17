<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * 
 * @property int $Event ID
 * @property int $Category ID
 * @property string $Title
 * @property Carbon $Duration
 * 
 * @property EventCategory $event_category
 * @property Cast $cast
 * @property Playbill $playbill
 * @property SpectaclesRole $spectacles_role
 *
 * @package App\Models
 */
class Event extends Model
{
	protected $table = 'events';
	protected $primaryKey = 'Event ID';
	public $timestamps = false;

	protected $casts = [
		'Category ID' => 'int'
	];

	protected $dates = [
		'Duration'
	];

	protected $fillable = [
		'Category ID',
		'Title',
		'Duration'
	];

	public function event_category()
	{
		return $this->belongsTo(EventCategory::class, 'Category ID');
	}

	public function cast()
	{
		return $this->hasOne(Cast::class, 'Spectacles ID');
	}

	public function playbill()
	{
		return $this->hasOne(Playbill::class, 'Event ID');
	}

	public function spectacles_role()
	{
		return $this->hasOne(SpectaclesRole::class, 'Spectacle ID');
	}
}
