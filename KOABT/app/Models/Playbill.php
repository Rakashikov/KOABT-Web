<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $event_id event id
@property int $cast_id cast id
@property Cast $cast belongsTo
@property Event $event belongsTo
   
 */
class Playbill extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'playbill';

    /**
    * Mass assignable columns
    */
    protected $fillable=['cast_id',
'event_id',
'cast_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * cast
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function cast()
    {
        return $this->belongsTo(Cast::class,'cast_id');
    }

    /**
    * event
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }




}