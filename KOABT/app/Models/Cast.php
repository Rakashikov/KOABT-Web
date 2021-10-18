<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $spectacles_id spectacles id
@property int $aroles_id aroles id
@property Arole $actorRole belongsTo
@property Spectacle $event belongsTo
@property \Illuminate\Database\Eloquent\Collection $playbill belongsToMany
@property \Illuminate\Database\Eloquent\Collection $rehearsal belongsToMany
   
 */
class Cast extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'casts';

    /**
    * Mass assignable columns
    */
    protected $fillable=['aroles_id',
'spectacles_id',
'aroles_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * arole
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function arole()
    {
        return $this->belongsTo(ActorRole::class,'aroles_id');
    }

    /**
    * spectacle
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function spectacle()
    {
        return $this->belongsTo(Event::class,'spectacles_id');
    }

    /**
    * playbills
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function playbills()
    {
        return $this->belongsToMany(Playbill::class,'playbill');
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