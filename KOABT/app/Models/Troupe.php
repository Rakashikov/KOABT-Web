<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property \Illuminate\Database\Eloquent\Collection $actor hasMany
@property \Illuminate\Database\Eloquent\Collection $rehearsal belongsToMany
   
 */
class Troupe extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'troupes';

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
        return $this->hasMany(Actor::class,'troupe_id');
    }
    /**
    * rehearsals
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function rehearsals()
    {
        return $this->belongsToMany(Rehearsal::class,'rehearsals');
    }



}