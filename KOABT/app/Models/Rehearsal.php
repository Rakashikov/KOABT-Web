<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $type_id type id
@property int $troupe_id troupe id
@property int $actors_ids actors ids
@property Actorss $cast belongsTo
@property Troupe $troupe belongsTo
@property Type $typesOfRehearsal belongsTo
   
 */
class Rehearsal extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'rehearsals';

    /**
    * Mass assignable columns
    */
    protected $fillable=['actors_ids',
'type_id',
'troupe_id',
'actors_ids'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * actorss
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function actorss()
    {
        return $this->belongsTo(Cast::class,'actors_ids');
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
    * type
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function type()
    {
        return $this->belongsTo(TypesOfRehearsal::class,'type_id');
    }




}