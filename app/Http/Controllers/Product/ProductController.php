<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\State;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        if (Auth::user()->role->name == "Admin") {
             $products = Product::with('categories')->paginate(3); 
        } else if(Auth::user()->role->name == "Seller") {
             $products = Product::with('categories')->where(['user_id' => 2])->paginate(3);
       
        } else if(Auth::user()->role->name == "Trainer") {
             $products = Product::with('categories')->where(['user_id' => 4])->paginate(3);
        }
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
            'title'          => 'required|min:10',
            'slug'           => 'required|min:10|unique:products',
            'description'    => 'required|min:50',
            'status'         => 'required',
            'parent_id'      => 'required',
            'price'          => 'required',
            'discount_price' => 'lt:price',
            'qty'            => 'required|min:1',
            'thumbnail'      => 'required',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('thumbnail') && $request->hasFile('images')) {

            $count = 0;

            $thumbnail = $request->title . '_' . 'thumbnail.' . $extension;
            $product   = Product::create([
                'title'              => $request['title'],
                'description'        => $request['description'],
                'user_id'            => Auth::user()->id,
                'price'              => $request['price'],
                'discount_price'     => $request['discount_price'],
                'status'             => $request['status'],
                'slug'               => $request->slug,
                'thumbnail'          => $thumbnail,
                'qty'                => $request->qty,
                'state_id'          => Auth::user()->profile->product_district_id,
                'totalImageUploaded' => count($request->images),
            ]);

            $product->categories()->attach($request->parent_id);
            $destinationPath = '/images/products_images/' . $product->id . '/';

            foreach ($request->file('images') as $image) {

                $name = $product->title . '_' . $product->id . '_' . $count . '.' . $image->getClientOriginalExtension();
                $count += 1;
                $names[] = $destinationPath . $name;
                $image->move(public_path($destinationPath, $name), $name);
            }

            $name = $thumbnail;
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
      //  dd($product);
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
        // dd($request->all());

        $request->validate([
            'title'          => 'required|min:10',
            'description'    => 'required|min:50',
            'status'         => 'required',
            'parent_id'      => 'required',
            'price'          => 'required',
            'qty'            => 'required|min:1',
            'thumbnail'      => Rule::requiredIf(Product::findOrFail($id)->thumbnail == ''),
            
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //    dd($request->all());

        $count = Product::findOrFail($id)->totalImageUploaded;

        $names = [];

        $product = Product::findOrFail($id)->first();
        // dd($product);
        $product->title          = $request['title'];
        $product->description    = $request['description'];
        $product->user_id        = Auth::user()->id;
        $product->price          = $request['price'];
        $product->discount_price = $request['discount_price'];
        $product->status         = $request['status'];
        $product->slug           = $request->slug;
        $product->state_id       = Auth::user()->profile->product_district_id;
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail');
            //      dd($request->all());
            $extension = strtolower($extension->getClientOriginalExtension());

            $thumbnail          = $request->title . '_' . 'thumbnail.' . $extension;
            $product->thumbnail = $thumbnail;

        }
        $product->qty                = $request->qty;
        $product->totalImageUploaded = count([$request->images]) + $count;

        $product->categories()->detach();
        $product->categories()->attach($request->parent_id);
        $destinationPath = '/images/products_images/' . $product->id . '/';
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {

                $name = $product->title . '_' . $product->id . '_' . $count . '.' . $image->getClientOriginalExtension();
                $count += 1;
                $names[] = $destinationPath . $name;
                $image->move(public_path($destinationPath, $name), $name);
            }

        }
        if ($request->hasFile('thumbnail')) {
            $name = $thumbnail;
            $request->file('thumbnail')->move(public_path($destinationPath, $name), $name);
        }

        $product->save();

        foreach ($names as $img) {

            DB::table('product_images')->insert([
                'product_id' => $product->id,
                'image'      => $img,
            ]);
        }

        return back()->with('message', 'Product Updated Successfully');

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

    public function removeThumbnail(Request $request, Product $product)
    {

        File::delete(public_path($product->thumbnailPath()));
        DB::table('products')->where('id', $product->id)->update(['thumbnail' => '']);
        return back()->with('message', "Thumbnail removed Successfully");
    }

    public function showAllProductsOfSeller($id)
    {
        $products = Product::where('user_id', $id)->paginate(3);

        return view('admin.sellers.allproducts', compact('products'));
    }

    public function single($slug)
    {

        $product = Product::where('slug', $slug)->first();
        $productOfSameCategory = Product::where('slug', $slug)->first()->categories()->first()->title;
        $productOfSameCategory = Category::where('title', $productOfSameCategory)->first()->products;
       
        return view('details', compact('product', 'productOfSameCategory'));
    }

    public function allProductsWithCategory($category)
    {
        $category = Category::where('slug', $category)->first();

        $products = $category->products()->paginate(1);
        
        return view('category', compact('products', 'category'));
    }

    public function productImageDelete(Request $request)
    {

        if ($request->ajax()) {

            if (strpos($request->imageName, '_thumbnail.') !== false) {

                if (File::delete(public_path('/images' . Str::after($request->imageName, '/images'))) && Product::findOrFail($request->productId)->update(['thumbnail' => ''])) {

                    return response(1, 200);
                } else {
                    return response(-1, 200);
                }

            } else {

                $image = ProductImage::findOrFail($request->imageId)->first();
                //   return response($image->image);
                if (File::delete(public_path($image->image))) {
                    $product = Product::findOrFail($request->productId)->first();
                    $product->update(['totalImageUploaded' => $product->totalImageUploaded - 1]);

                    $image->delete();

                    return response($product->totalImageUploaded, 200);
                } else {
                    return response(-1, 200);
                }

            }
        }
    }


    public function showProductByStates($name) {
        $stateInfo = State::where('name', $name )->first();
        $products = Product::where('state_id', $stateInfo->id)->paginate(3);
        
        return view('states', compact('products', 'stateInfo'));
    }
}
