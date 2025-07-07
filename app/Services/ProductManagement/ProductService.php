<?php

namespace App\Services\ProductManagement;

use App\Http\Traits\FileManagementTrait;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isArray;

class ProductService
{
    use FileManagementTrait;

    public function getProducts($orderBy = 'sort_order', $order = 'asc')
    {
        return Product::orderBy($orderBy, $order)->latest();
    }
    public function getProduct(string $encryptedId): Product|Collection
    {
        return Product::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedProduct(string $encryptedId): Product|Collection
    {
        return Product::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createProduct(array $data, $primaryImage, $images): Product
    {
        return DB::transaction(function () use ($data, $primaryImage, $images) {
            $data['status'] = Product::STATUS_ACTIVE;
            $data['is_featured'] = Product::NOT_FEATURED;
            $data['created_by'] = admin()->id;
            $product = Product::create($data);

            if (!empty($data['attribute_values']) && isArray($data['attribute_values']) && count($data['attribute_values']) > 0) {
                foreach ($data['attribute_values'] as $attributeValue) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_name' => ProductAttribute::SIZE_ATTRIBUTE,
                        'attribute_value' => $attributeValue,
                    ]);
                }
            }

            if ($primaryImage) {
                $data['image'] = $this->handleFileUpload($primaryImage, 'products', $data['name']);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $data['image'],
                    'is_primary' => 1
                ]);
            }
            if (!empty($data['images']) && isArray($data['images']) && count($data['images']) > 0) {
                foreach ($images as $image) {
                    $imagePath = $this->handleFileUpload($image, 'products', $data['name']);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $imagePath
                    ]);
                }
            }

            return $product;
        });
    }

    public function updateProduct(Product $product, array $data, $primaryImage, $images): Product
    {
        return DB::transaction(function () use ($product, $data, $primaryImage, $images) {
            $data['updated_by'] = admin()->id;
            $product->update($data);

            if (!empty($data['attribute_values']) && isArray($data['attribute_values']) && count($data['attribute_values']) > 0) {
                ProductAttribute::where('product_id', $product->id)->where('attribute_name', ProductAttribute::SIZE_ATTRIBUTE)->delete();
                foreach ($data['attribute_values'] as $attributeValue) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_name' => ProductAttribute::SIZE_ATTRIBUTE,
                        'attribute_value' => $attributeValue,
                    ]);
                }
            }


            if ($primaryImage) {
                $oldPrimaryImage = ProductImage::where('product_id', $product->id)
                    ->where('is_primary', 1)
                    ->get();
                $this->fileDelete($oldPrimaryImage->pluck('image')->toArray());
                $oldPrimaryImage->each->delete();

                $data['image'] = $this->handleFileUpload($primaryImage, 'products', $data['name']);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $data['image'],
                    'is_primary' => 1
                ]);
            }


            if (!empty($images) && is_array($images) && count($images) > 0) {
                // Delete old non-primary images
                $oldImages = ProductImage::where('product_id', $product->id)
                    ->where('is_primary', 0)
                    ->get();

                $this->fileDelete($oldImages->pluck('image')->toArray());
                $oldImages->each->delete();

                // Save new images
                foreach ($images as $image) {
                    $imagePath = $this->handleFileUpload($image, 'products', $data['name']);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $imagePath,
                        'is_primary' => 0
                    ]);
                }
            }

            return $product;
        });
    }

    public function delete(Product $product): void
    {
        $product->update(['deleted_by' => admin()->id]);
        $product->delete();
    }

    public function restore(string $encryptedId): void
    {
        $product = $this->getDeletedProduct($encryptedId);
        $product->update(['updated_by' => admin()->id]);
        $product->restore();
    }

    public function permanentDelete(string $encryptedId): void
    {
        $product = $this->getDeletedProduct($encryptedId);
        $product->forceDelete();
    }

    public function toggleStatus(Product $product): void
    {
        $product->update([
            'status' => !$product->status,
            'updated_by' => admin()->id
        ]);
    }
    public function toggleFeatured(Product $product): void
    {
        $product->update([
            'is_featured' => !$product->is_featured,
            'updated_by' => admin()->id
        ]);
    }
}
