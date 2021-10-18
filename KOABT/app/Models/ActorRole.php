<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $role_id role id
@property int $actor_id actor id
@property Actor $actor belongsTo
@property Role $role belongsTo
@property \Illuminate\Database\Eloquent\Collection $cast belongsToMany
   
 */
class ActorRole extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'actor_roles';

    /**
    * Mass assignable columns
    */
    protected $fillable=['actor_id',
'role_id',
'actor_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * actor
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function actor()
    {
        return $this->belongsTo(Actor::class,'actor_id');
    }

    /**
    * role
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    /**
    * casts
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function casts()
    {
        return $this->belongsToMany(Cast::class,'casts');
    }



}