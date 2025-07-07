<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'is_featured',
        'sort_order',
        'slug',
        'stock_no',
        'category_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

   public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge(parent::getAppends(), [

            'status_label',
            'status_color',
            'status_btn_label',
            'status_btn_color',

            'featured_label',
            'featured_color',
            'featured_btn_label',
            'featured_btn_color',

        ]);
    }
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static function statusList(): array
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive',
        ];
    }
    public function getStatusLabelAttribute()
    {
        return self::statusList()[$this->status];
    }

    public function getStatusColorAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? 'badge-success' : 'badge-error';
    }

    public function getStatusBtnLabelAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? self::statusList()[self::STATUS_INACTIVE] : self::statusList()[self::STATUS_ACTIVE];
    }

    public function getStatusBtnColorAttribute()
    {
        return $this->status == self::STATUS_ACTIVE ? 'btn-error' : 'btn-success';
    }
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_INACTIVE);
    }

    // ========================================Featured labels===============================
    public const FEATURED = 1;
    public const NOT_FEATURED = 0;


    public static function featuredList(): array
    {
        return [
            self::FEATURED => 'Featured',
            self::NOT_FEATURED => 'Not Featured',
        ];
    }
    public function getFeaturedLabelAttribute()
    {
        return self::featuredList()[$this->is_featured];
    }

    public function getFeaturedColorAttribute()
    {
        return $this->is_featured == self::FEATURED ? 'badge-success' : 'badge-error';
    }

    public function getFeaturedBtnLabelAttribute()
    {
        return $this->is_featured == self::FEATURED ? self::featuredList()[self::NOT_FEATURED] : self::featuredList()[self::FEATURED];
    }

    public function getFeaturedBtnColorAttribute()
    {
        return $this->is_featured == self::FEATURED ? 'btn-error' : 'btn-success';
    }
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', self::FEATURED);
    }
    public function scopeNotFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', self::NOT_FEATURED);
    }

    // public function productImages()
    // {
    //     return $this->hasMany(ProductImage::class, 'product_id', 'id');
    // }
    

    // public function primaryImage()
    // {
    //     return $this->hasOne(ProductImage::class, 'product_id', 'id')->where('is_primary', 1);
    // }

    // public function nonPrimayImages()
    // {
    //     return $this->hasMany(ProductImage::class)->where('is_primary', 0);
    // }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function primaryImage(): HasMany
    {
        return $this->images()->primary();
    }

    public function nonPrimayImages(): HasMany
    {
        return $this->images()->notPrimary();
    }
    public function activeImages(): HasMany
    {
        return $this->images()->active();
    }
}
