<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $troupe_id troupe id
@property int $position_id position id
@property varchar $last_name last name
@property varchar $first_name first name
@property varchar $middle_name middle name
@property text $discription discription
@property Position $position belongsTo
@property Troupe $troupe belongsTo
@property \Illuminate\Database\Eloquent\Collection $actorRole hasMany
   
 */
class Actor extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'actors';

    /**
    * Mass assignable columns
    */
    protected $fillable=['discription',
'troupe_id',
'position_id',
'last_name',
'first_name',
'middle_name',
'discription'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * position
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }

    /**
    * troupe
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function troupe()
    {
        return $this->belongsTo(Troupe::class,'troupe_id');
    }

    /**
    * actorRoles
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function actorRoles()
    {
        return $this->hasMany(ActorRole::class,'actor_id');
    }



}