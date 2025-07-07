<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;

class HomeController extends Controller
{
  public function home()
  {
    $data['products'] = Product::with(['primaryImage', 'nonPrimayImages', 'productAttributes'])->Featured()->latest()->take(3)->get();
    $data['categories']=Category::get();
    return view('frontend.pages.home', $data);
  }

  public function detail(string $slug)
  {
    $data['product'] = Product::where('slug', $slug)->first();
    $data['product']->attribute_values = $data['product']->productAttributes
      ->where('attribute_name', ProductAttribute::SIZE_ATTRIBUTE)
      ->pluck('attribute_value')
      ->toArray();
    $data['related_products'] = Product::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->latest()->take(6)->get();
    $data['related_products']->load(['primaryImage', 'nonPrimayImages']);
    return view('frontend.pages.detail', $data);
  }

  public function shop()
  {
    $prods = Product::with(['primaryImage',])->latest()->paginate(12)->all();
    return view('frontend.pages.shop', compact('prods'));
  }

  public function product()
  {
    return view('frontend.pages.product',);
  }
 


}
