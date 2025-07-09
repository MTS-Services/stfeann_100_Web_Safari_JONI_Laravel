<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use GuzzleHttp\Psr7\Request;

class HomeController extends Controller
{
  public function home()
  {
    $data['products'] = Product::with(['primaryImage', 'nonPrimayImages', 'productAttributes'])->featured()->orderBy('id', 'asc')->take(3)->get();
    $data['categories']=Category::active()->get();
    return view('frontend.pages.home', $data);
  }

  public function detail(string $slug)
  {
    $data['product'] = Product::where('slug', $slug)->first();
    $data['product']->attribute_values = $data['product']->productAttributes
      ->where('attribute_name', ProductAttribute::SIZE_ATTRIBUTE)
      ->pluck('attribute_value')
      ->toArray();
    $data['related_products'] = Product::where('category_id', $data['product']->category_id)->where('id', '!=', $data['product']->id)->orderBy('id', 'asc')->take(6)->get();
    $data['related_products']->load(['primaryImage', 'nonPrimayImages']);
    return view('frontend.pages.detail', $data);
  }

   public function shop()
    {
        
        $prods = Product::with(['primaryImage'])->orderBy('id', 'asc')->paginate(8);
        return view('frontend.pages.shop', compact('prods'));
    }

  public function about()
  {
    return view('frontend.pages.about',);
  }
 
  public function categoryProduct(string $slug){
    $data['category'] = Category::where('slug', $slug)->first();
    $data['categoryName'] = $data['category']->name;
    $data['products'] = $data['category']->products()->orderBy('id', 'asc')->paginate(8);
    return view('frontend.pages.category', $data);
  }

}
