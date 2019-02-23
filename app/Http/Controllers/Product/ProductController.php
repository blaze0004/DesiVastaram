<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('categories')->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('admin.products.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $extension = $request->file('thumbnail');
        $extension = strtolower($extension->getClientOriginalExtension());

        $request->validate([

            'images'   => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('thumbnail') && $request->hasfile('images')) {

            $count = 0;
           
            $thumbnail = $request->title . '_'.'thumbnail.' . $extension;
            $product = Product::create([
                'title'          => $request['title'],
                'description'    => $request['description'],
                'user_id'        => Auth::user()->id,
                'price'          => $request['price'],
                'discount_price' => $request['discount_price'],
                'status'         => $request['status'],
                'slug'           => $request->slug,
                'thumbnail'      => $thumbnail,
                'qty'           => $request->qty
            ]);
            $product->categories()->attach($request->parent_id);
             $destinationPath = '/images/products_images/' . $product->id . '/';

            foreach ($request->file('images') as $image) {

                $name = $product->title . '_' . $product->id . '_' . $count . '.' . $image->getClientOriginalExtension();
                $count += 1;
                $names[] = $destinationPath . $name;
                $image->move(public_path($destinationPath, $name), $name);
            }


            $name            = $thumbnail;
            $request->file('thumbnail')->move(public_path($destinationPath, $name), $name);
        }

        foreach ($names as $img) {

            DB::table('product_images')->insert([
                'product_id' => $product->id,
                'image'      => $img,
            ]);
        }

        return back()->with('message', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        dd($product);
        return view('details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $product_categories = Category::with('childrens')->get();
        return view('admin.products.create', compact('product', 'product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //

        if ($product->delete()) {
            return back()->with('message', 'Product Deleted successfully!');
        } else {
            return back()->with('message', 'Error occured during deletion!');
        }
    }

    // Remove Product Image On Update

    public function removeProductImage($id)
    {

        $image = \App\ProductImage::findOrFail($id);
        File::delete($image->image);
        $image->delete();
        $msg = "Image Removed";
        return response()->json(['success' => 'Data is successfully added']);
        return back()->with('message', "Image removed Successfully");

    }

    public function removeThumbnail(Request $request, Product $product) {

        File::delete(public_path($product->thumbnailPath()));
        DB::table('products')->where('id', $product->id)->update(['thumbnail' => '']);
        return back()->with('message', "Thumbnail removed Successfully");
    }

    public function showAllProductsOfSeller($id)
    {
        $products = Product::where('user_id', $id)->paginate(3);

        return view('admin.sellers.allproducts', compact('products'));
    }

    public function single($slug) {

        $product = Product::where('slug', $slug)->first();
        return view('details', compact('product'));
    }


    public function allProductsWithCategory($category) {

        return view('category');
    }

    
}
