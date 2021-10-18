<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $category_id category id
@property varchar $title title
@property time $duration duration
@property Category $eventCategory belongsTo
@property \Illuminate\Database\Eloquent\Collection $cast belongsToMany
@property \Illuminate\Database\Eloquent\Collection $playbill belongsToMany
@property \Illuminate\Database\Eloquent\Collection $spectaclesrole belongsToMany
   
 */
class Event extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'events';

    /**
    * Mass assignable columns
    */
    protected $fillable=['duration',
'category_id',
'title',
'duration'];

    /**
    * Date time columns.
    */
    protected $dates=['duration'];

    /**
    * category
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
        return $this->belongsTo(EventCategory::class,'category_id');
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
    * spectaclesroles
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function spectaclesroles()
    {
        return $this->belongsToMany(Spectaclesrole::class,'spectacles_roles');
    }



}