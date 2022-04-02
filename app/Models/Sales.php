<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Sales
 *
 * @property int $customer_id
 */
class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    /**
     * The attributes that should be appended.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'total_items_sold',
        'total_bill',
    ];

    public function getTotalItemsSoldAttribute()
    {
        return $this->hasMany(SaleItems::class, 'sale_id')->sum('qty');
    }

    public function getTotalBillAttribute()
    {
        return $this->hasMany(SaleItems::class, 'sale_id')->sum(\DB::raw('qty * price'));
    }


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItems::class, 'sale_id');
    }
}
