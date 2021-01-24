<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use SoftDeletes;

    /**
     * Validation rules
     * @var array
     */
    public $rules = [
        'name' => 'required|unique:enterprises,name',
        'address' => 'required',
        'address_2' => 'required',
        'name' => 'required',
        'state_code' => 'required',
        'city_code' => 'required',
    ];

    /**
     * Validation messages
     * @var array
     */
    public $messages = [
        'required' => 'Esta informação é obrigatória',
        'name.unique' => 'Já existe um empreendimento com este nome',
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
        'begin_at',
        'end_at',
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
        'cep',
        'address',
        'neighborhood',
        'number',
        'state_name',
        'city_name',
        'construction_value',
        'begin_at',
        'end_at',
        'technical_managers_id',
    ];

    /**
     * Relationships
     * --------------------------------------------------------
     */

    /**
     * Sales relation.
     * @return BelongsToMany
     */
    public function technicals()
    {
        return $this->belongsToMany('App\TechnicalManager');
    }

    /*
     * Scoups
     * --------------------------------------------------------
     */

    public function scopeFinisheds($query)
    {
        return $query->where('end_at', '<=', Carbon::now());
    }

    public function scopeProgress($query)
    {
        return $query->where('end_at', '>=', Carbon::now());
    }

    /**
     * Acessors and Mutators
     * --------------------------------------------------------
     */

     
    /**
     * Biz methods
     * --------------------------------------------------------
     */

}
