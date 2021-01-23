<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
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
    protected $casts = [
        'code' => 'integer',
    ];

    /**
     * @see parent::$primaryKey
     */
     protected $primaryKey = 'code';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'abbr',
        'region',
    ];

    /**
     * Relationships
     * ---------------------------------------------------------------------------------------------
     */

    /**
     * Cities relation.
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany('App\City', 'state_code');
    }

 
     /**
      * Acessors and Mutators
      * ---------------------------------------------------------------------------------------------
      */
 
 
     /**
      * Biz methods
      * ---------------------------------------------------------------------------------------------
      */
 
     /**
      * Find a state by its name.
      * @param string $name
      * @return self|null
      */
     public static function findByName($name)
     {
         return static::whereName($name)->first();
     }
 
     /**
      * Find a state by its abbreviation.
      * @param string $abbr
      * @return self|null
      */
     public static function findByAbbr($abbr)
     {
         return static::whereAbbr($abbr)->first();
     }
 
     /**
      * Find a state by its code.
      * @param string $code
      * @return self|null
      */
     public static function findByCode($code)
     {
         return static::whereCode($code)->first();
     }
}
