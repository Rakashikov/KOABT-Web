<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cast
 * 
 * @property int $ID
 * @property int $Spectacles ID
 * @property int $Aroles ID
 * 
 * @property ActorRole $actor_role
 * @property Event $event
 * @property Playbill $playbill
 * @property Rehearsal $rehearsal
 *
 * @package App\Models
 */
class Cast extends Model
{
	protected $table = 'casts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'Spectacles ID' => 'int',
		'Aroles ID' => 'int'
	];

	protected $fillable = [
		'ID',
		'Spectacles ID',
		'Aroles ID'
	];

	public function actor_role()
	{
		return $this->belongsTo(ActorRole::class, 'Aroles ID');
	}

	public function event()
	{
		return $this->belongsTo(Event::class, 'Spectacles ID');
	}

	public function playbill()
	{
		return $this->hasOne(Playbill::class, 'Cast ID', 'ID');
	}

	public function rehearsal()
	{
		return $this->hasOne(Rehearsal::class, 'Actors IDs', 'ID');
	}
}
