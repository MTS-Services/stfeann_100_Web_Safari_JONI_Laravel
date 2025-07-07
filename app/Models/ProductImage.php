<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends BaseModel
{
    protected $fillable = [
        'sort_order',
        'product_id',
        'image',
        'is_primary',
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [

            'modified_image',

        ]);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
  

    public const IS_PRIMARY = 1;
    public const NOT_PRIMARY = 0;

    public function scopePrimary(Builder $query): Builder
    {
        return $query->where('is_primary', self::IS_PRIMARY);
    }
    // Corrected scope method with Builder type hint
    public function scopeNotPrimary(Builder $query): Builder
    {
        return $query->where('is_primary', self::NOT_PRIMARY);
    }

    public function getModifiedImageAttribute(): string
    {
        return storage_url($this->image);
    }
}
