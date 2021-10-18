<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $position_id position id
@property varchar $first_name first name
@property varchar $middle_name middle name
@property varchar $last_name last name
@property varchar $phone phone
@property varchar $e-mail e-mail
@property Position $administrativePosition belongsTo
   
 */
class Administration extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'administrations';

    /**
    * Mass assignable columns
    */
    protected $fillable=['e-mail',
'position_id',
'first_name',
'middle_name',
'last_name',
'phone',
'e-mail'];

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
        return $this->belongsTo(AdministrativePosition::class,'position_id');
    }




}