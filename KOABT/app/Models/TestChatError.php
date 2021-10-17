<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestChatError
 * 
 * @property string|null $Username
 * @property string|null $Error Message
 *
 * @package App\Models
 */
class TestChatError extends Model
{
	protected $table = 'test_chat_errors';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'Username',
		'Error Message'
	];
}
