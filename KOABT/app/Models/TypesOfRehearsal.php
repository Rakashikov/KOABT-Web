<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property \Illuminate\Database\Eloquent\Collection $rehearsal belongsToMany
   
 */
class TypesOfRehearsal extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'types_of_rehearsals';

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
    * rehearsals
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function rehearsals()
    {
        return $this->belongsToMany(Rehearsal::class,'rehearsals');
    }



}