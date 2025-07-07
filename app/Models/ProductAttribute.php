<?php

namespace App\Models;


class ProductAttribute extends BaseModel
{
    protected $fillable = [
        'sort_order',
        'product_id',
        'attribute_name',
        'attribute_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public const SIZE_ATTRIBUTE = 'size';
    public const SIZE_XXL = 'XXL';
    public const SIZE_XL = 'XL';
    public const SIZE_L = 'L';
    public const SIZE_M = 'M';
    public const SIZE_S = 'S';
    public const SIZE_XS = 'XS';

    public static function sizeList(): array
    {
        return [
            self::SIZE_XXL => 'XXL',
            self::SIZE_XL => 'XL',
            self::SIZE_L => 'L',
            self::SIZE_M => 'M',
            self::SIZE_S => 'S',
            self::SIZE_XS => 'XS',
        ];
    }
}
