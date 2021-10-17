<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestChat
 * 
 * @property string|null $Username
 * @property string|null $Text
 *
 * @package App\Models
 */
class TestChat extends Model
{
	protected $table = 'test_chat';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'Username',
		'Text'
	];
}
