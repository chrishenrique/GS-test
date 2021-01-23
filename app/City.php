<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Validation rules
     * @var array
     */
    public static $rules = [];

    /**
     * Validation messages
     * @var array
     */
    public static $messages = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $primaryKey = 'code';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'state_code',
        'value',
    ];

    protected $appends = [
        'full_name', 'half_name',
    ];

    /**
     * Relationships
     * ---------------------------------------------------------------------------------------------
     */

    /**
     * State relation.
     * @return BelongsTo
     */
     public function state()
     {
         return $this->belongsTo('App\State', 'state_code');
     }

    /**
     * Customers relation.
     * @return BelongsToMany
     */
    public function enterprises()
    {
        return $this->belongsToMany('App\Enterprise', 'enterprises_cities', 'city_code', 'enterprise_id');
    }

    /**
     * Scopes
     * ---------------------------------------------------------------------------------------------
     */
 
     /**
      * Acessors and Mutators
      * ---------------------------------------------------------------------------------------------
      */

    /**
     * Get city name with state name
     *
     * @param string$name
     * @return string
     */
    public function getFullNameAttribute($name)
    {
        return $this->name."/".$this->state->name;
    }

    /**
     * Get city name with state abbr
     *
     * @param string$name
     * @return string
     */
    public function getHalfNameAttribute($name)
    {
        return $this->name."/".$this->state->abbr;
    }
 
 
     /**
      * Biz methods
      * ---------------------------------------------------------------------------------------------
      */
 
     /**
      * Find a city by its name.
      * @param string $name
      * @return self|null
      */
     public static function findByName($name)
     {
         return static::whereName($name)->first();
     }
 
     /**
      * Find a city by its code.
      * @param string $code
      * @return self|null
      */
     public static function findByCode($code)
     {
         return static::whereCode($code)->first();
     }
}
