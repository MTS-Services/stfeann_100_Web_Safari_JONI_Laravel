<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class HomeController extends Controller
{
  public function home()
  {
    $data['products'] = Product::with(['primaryImage', 'nonPrimayImages', 'productAttributes'])->latest()->take(3)->get();
    return view('frontend.pages.home', $data);
  }

  public function detail(string $slug)
  {
    $data['product'] = Product::where('slug', $slug)->first();
    $data['related_products'] = collect();

    if ($data['product'] && $data['product']->category) {
      $data['related_products'] = $data['product']->category->products
        ->where('id', '!=', $data['product']->id)
        ->values();
    }

    return view('frontend.pages.detail', $data);
  }

  public function shop()
  {
    $prods = Product::latest()->take(12)->get();
    return view('frontend.pages.shop', compact('prods'));
  }
}
