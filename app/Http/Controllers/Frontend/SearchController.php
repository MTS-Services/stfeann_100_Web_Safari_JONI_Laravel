<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->search) {
            $search = $request->search;
            $searchProducts = Product::where('name', 'like', "%$search%")->latest()->paginate(15);

            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('massage', 'empty');
        }
    }
}
