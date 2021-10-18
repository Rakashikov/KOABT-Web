<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $category category
@property \Illuminate\Database\Eloquent\Collection $event hasMany
   
 */
class EventCategory extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'event_category';

    /**
    * Mass assignable columns
    */
    protected $fillable=['category',
'category'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * events
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function events()
    {
        return $this->hasMany(Event::class,'category_id');
    }



}