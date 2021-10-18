<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $user user
@property varchar $changed_value changed value
@property text $old_value old value
   
 */
class ActorsChangeInformation extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'actors_change_information';

    /**
    * Mass assignable columns
    */
    protected $fillable=['old_value',
'user',
'changed_value',
'old_value'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}