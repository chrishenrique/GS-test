<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:units',
        'unit_number' => 'required',
        'total_area' => 'required',
        'private_area' => 'required',
        'roof_area' => 'required',
        'sale_value' => 'required',
        'bank_appraisal_value' => 'required',
    ];

    /**
     * Validation messages
     * @var array
     */
    public static $messages = [
        'required' => 'Esta informação é obrigatória',
        'name.unique' => 'Já existe uma unidade com este nome',
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
        'unit_number',
        'total_area',
        'private_area',
        'roof_area',
        'has_roof',
        'sale_value',
        'bank_appraisal_value', // Valor avaliado pelo banco
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
