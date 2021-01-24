<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    // Status types
    const STATUS_DONE = 1;
    const STATUS_PENDING = 2;
    const STATUS_NEGOTIATION = 3;
    const STATUS_LOST = 4;

    /**
     * Validation rules
     * @var array
     */
    public $rules = [];

    /**
     * Validation messages
     * @var array
     */
    public $messages = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'saled_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sold_by',
        'total_discounts',
        'status',
    ];

    /**
     * Relationship
     * ---------------------------------------------------------------------------------------------
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesman()
    {
        return $this->belongsTo(Salesman::class)->withTrashed();
    }

    /**
     * Scopes
     * ---------------------------------------------------------------------------------------------
     */
    
    public function scopeDones($query)
    {
        return $query->whereStatus(self::STATUS_DONE);
    }

    public function scopePendings($query)
    {
        return $query->whereStatus(self::STATUS_PENDING);
    }

    public function scopeNegotiations($query)
    {
        return $query->whereStatus(self::STATUS_NEGOTIATION);
    }

    public function scopeLosts($query)
    {
        return $query->whereStatus(self::STATUS_LOST);
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
     * Get all status
     */
    public function getStatus(): array
    {
       return [
            self::STATUS_DONE =>  'Concluída',
            self::STATUS_PENDING =>  'Pendente',
            self::STATUS_NEGOTIATION =>  'Em negociação',
            self::STATUS_LOST =>  'Perdida',
       ];
    }

    /** 
     * Get status
     */
    public function getStatusName($status = null): string
    {
        $status = $status ?: $this->status;
        $statuses = $this->getStatus();

       return $statuses[$status];
    }
}
