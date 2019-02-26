<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function productSearchSuggestions(Request $request)
    {

        $query   = $request->input('query');
        $product = Product::with('categoriesTitle')->where('title', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->select('title')->get();
        return view('search', compact($product));
    }

    public function productSearch(Request $request, $query) {
        $query = $query;
        $products = Product::where('title', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->paginate(1);
     

        return view('search', compact('products', 'query'));
    }
    public function autocomplete()
    {

    }
}
