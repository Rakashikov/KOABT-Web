<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $character_name character name
@property \Illuminate\Database\Eloquent\Collection $actorRole hasMany
@property \Illuminate\Database\Eloquent\Collection $spectacless belongsToMany
   
 */
class Role extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'roles';

    /**
    * Mass assignable columns
    */
    protected $fillable=['character_name',
'character_name'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * actorRoles
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function actorRoles()
    {
        return $this->hasMany(ActorRole::class,'role_id');
    }
    /**
    * spectaclesses
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function spectaclesses()
    {
        return $this->belongsToMany(Spectacless::class,'spectacles_roles');
    }



}