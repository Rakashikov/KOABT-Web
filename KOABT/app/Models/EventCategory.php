<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventCategory
 * 
 * @property int $ID
 * @property string $Category
 * 
 * @property Collection|Event[] $events
 *
 * @package App\Models
 */
class EventCategory extends Model
{
	protected $table = 'event_category';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Category'
	];

	public function events()
	{
		return $this->hasMany(Event::class, 'Category ID');
	}
}
