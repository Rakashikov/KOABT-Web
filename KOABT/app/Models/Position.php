<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property \Illuminate\Database\Eloquent\Collection $actor hasMany
   
 */
class Position extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'positions';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name',
'name'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * actors
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function actors()
    {
        return $this->hasMany(Actor::class,'position_id');
    }



}