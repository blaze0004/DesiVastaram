<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function productSearchSuggestions(Request $request) {
    	if ($request->ajax()) {
    		$query = $request->q;
    		$product = Product::with('categoriesTitle')->where('title', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->select('title')->get();


  			$products = [];

  			foreach ($product as $p) {
  				$products[] = [
  					'title' => $p->title, 
  				];
  			}

    		return response(compact('products'), 200);
    	}
    }

    public function autocomplete() {
    	
    }
}
