<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = trim($request->input('search'));

        if (!$searchTerm) {
            return redirect()->back()->with('message', 'Search term cannot be empty.');
        }

        $searchProducts = Product::where('name', 'like', "%{$searchTerm}%")
            ->latest()
            ->paginate(5);

        return view('frontend.pages.search', compact('searchProducts', 'searchTerm'));
    }
}

