<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property \Illuminate\Database\Eloquent\Collection $administration hasMany
   
 */
class AdministrativePosition extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'administrative_positions';

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
    * administrations
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function administrations()
    {
        return $this->hasMany(Administration::class,'position_id');
    }



}