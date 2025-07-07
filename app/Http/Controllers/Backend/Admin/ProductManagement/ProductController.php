<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Services\ProductManagement\CategoryService;
use App\Services\ProductManagement\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use AuditRelationTraits;
    protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('pm.product.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('pm.product.trash');
    }

    protected ProductService $productService;
    protected CategoryService $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = $this->productService->getProducts();
            return DataTables::eloquent($query)
                ->editColumn('category_id', fn($book) => $book->category?->name)
                ->editColumn('status', fn($product) => "<span class='badge badge-soft {$product->status_color}'>{$product->status_label}</span>")
                ->editColumn('is_featured', fn($product) => "<span class='badge badge-soft {$product->featured_color}'>{$product->featured_label}</span>")
                ->editColumn('created_by', fn($product) => $this->creater_name($product))
                ->editColumn('created_at', fn($product) => $product->created_at_formatted)
                ->editColumn('action', fn($product) => view('components.admin.action-buttons', ['menuItems' => $this->menuItems($product)])->render())
                ->rawColumns(['status', 'category_id', 'is_featured', 'created_by', 'created_at', 'action'])
                ->make(true);
        }

        return view('backend.admin.product-management.product.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
            ],
            [
                'routeName' => 'pm.product.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],
            [
                'routeName' => 'pm.product.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'pm.product.is-featured',
                'params' => [encrypt($model->id)],
                'label' => $model->featured_btn_label,
            ],

            [
                'routeName' => 'pm.product.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
            ]

        ];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['products'] = $this->productService->getProducts();
        $data['categories'] = $this->categoryService->getCategories()->select(['id', 'name'])->get();
        return view('backend.admin.product-management.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $primaryImage = $request->validated('image') && $request->hasFile('image') ? $request->file('image') : null;
            $images = $request->validated('images') && $request->hasFile('images') ? $request->file('images') : null;
            $this->productService->createProduct($validated, $primaryImage, $images);
            session()->flash('success', 'Product created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Product create failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $data = $this->productService->getProduct($id);
        $data['category_name'] = $data->category?->name;
        $data['creater_name'] = $this->creater_name($data);
        $data['updater_name'] = $this->updater_name($data);
        $data['image'] = $data->primaryImage->first() ? $data->primaryImage->first()->modified_image : null;
        $data['productAttributes'] = $data->productAttributes->select(['attribute_value']);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = $this->productService->getProduct($id);
        $data['product']->load(['images', 'primaryImage', 'nonPrimayImages', 'productAttributes']);
        $data['product']->attribute_values = $data['product']->productAttributes
            ->where('attribute_name', ProductAttribute::SIZE_ATTRIBUTE)
            ->pluck('attribute_value')
            ->toArray();
        $data['categories'] = $this->categoryService->getCategories()->select(['id', 'name'])->get();
        return view('backend.admin.product-management.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {
            $product = $this->productService->getProduct($id);
            $validated = $request->validated();
            $primaryImage = $request->validated('image') && $request->hasFile('image') ? $request->file('image') : null;
            $images = $request->validated('images') && $request->hasFile('images') ? $request->file('images') : null;
            $this->productService->updateProduct($product, $validated, $primaryImage, $images);
            session()->flash('success', "Product updated successfully");
        } catch (\Throwable $e) {
            session()->flash('Product update failed');
            throw $e;
        }
        return $this->redirectIndex();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $admin = $this->productService->getProduct($id);
            $this->productService->delete($admin);
            session()->flash('success', 'Admin deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Admin delete failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }
    public function trash(Request $request)
    {
        if ($request->ajax()) {
            $query = $this->productService->getProducts()->onlyTrashed();

            return DataTables::eloquent($query)
                ->editColumn('category_id', fn($book) => $book->category?->name)
                ->editColumn('status', fn($product) => "<span class='badge badge-soft {$product->status_color}'>{$product->status_label}</span>")
                ->editColumn('is_featured', fn($product) => "<span class='badge badge-soft {$product->featured_color}'>{$product->featured_label}</span>")
                ->editColumn('deleted_by', fn($admin) => $this->deleter_name($admin))
                ->editColumn('deleted_at', fn($admin) => $admin->deleted_at_formatted)
                ->editColumn('action', fn($admin) => view('components.admin.action-buttons', [
                    'menuItems' => $this->trashedMenuItems($admin),
                ])->render())
                ->rawColumns(['category_id', 'status', 'is_featured', 'deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }

        return view('backend.admin.product-management.product.trash');
    }


    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'pm.product.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'pm.product.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]

        ];
    }
    public function restore(string $id)
    {
        try {
            $this->productService->restore($id);
            session()->flash('success', "Product restored successfully");
        } catch (\Throwable $e) {
            session()->flash('Product restore failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }

    public function permanentDelete(string $id)
    {
        try {
            $this->productService->permanentDelete($id);
            session()->flash('success', "Product permanently deleted successfully");
        } catch (\Throwable $e) {
            session()->flash('Product permanent delete failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }
    public function status(string $id)
    {
        $user = $this->productService->getProduct($id);
        $this->productService->toggleStatus($user);
        session()->flash('success', 'Product status updated successfully!');
        return redirect()->back();
    }
    public function isFeatured(string $id)
    {
        $user = $this->productService->getProduct($id);
        $this->productService->toggleFeatured($user);
        session()->flash('success', 'Product is featured updated successfully!');
        return redirect()->back();
    }
}
