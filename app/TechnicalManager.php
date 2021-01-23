<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnicalManagers extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:technical_managers',
    ];

    /**
     * Validation messages
     * @var array
     */
    public static $messages = [
        'required' => 'Esta informação é obrigatória',
        'name.unique' => 'Já existe um responsavel tecnico com este nome',
    ];
    
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relationships
     * --------------------------------------------------------
     */

    /**
     * Enterprises relation.
     * @return BelongsToMany
     */
    public function enterprises()
    {
        return $this->belongsToMany('App\Enterprise');
    }

    /*
     * Scoups
     * --------------------------------------------------------
     */


    /**
     * Acessors and Mutators
     * --------------------------------------------------------
     */

     
    /**
     * Biz methods
     * --------------------------------------------------------
     */
}
