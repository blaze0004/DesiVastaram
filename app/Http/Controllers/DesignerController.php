<?php

namespace App\Http\Controllers;

use App\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requirements = Designer::where('user_id', Auth::id())->paginate(3);

        return view('designer.index', compact('requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('designer.create');
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
           
            'description'    => 'required|min:50',
           
         
            'thumbnail'      => 'required',

        ]);

        if ($request->hasFile('thumbnail') && $request->hasFile('images')) {

            $count = 0;

            $thumbnail = $request->title . '_' . 'thumbnail.' . $extension;
            $designer   = Designer::create([
                'title'              => $request['title'],
                'description'        => $request['description'],
                'user_id'            => Auth::id(),
               
                'thumbnail'          => $thumbnail,
               
                'state_id'           => Auth::user()->profile->product_district_id,
                'totalImageUploaded' => count($request->images),
            ]);

            
            $destinationPath = '/images/designer/' . $designer->id . '/';

            foreach ($request->file('images') as $image) {

                $name = $designer->title . '_' . $designer->id . '_' . $count . '.' . $image->getClientOriginalExtension();
                $count += 1;
                $names[] = $destinationPath . $name;
                $image->move(public_path($destinationPath, $name), $name);
            }

            $name = $thumbnail;
            $request->file('thumbnail')->move(public_path($destinationPath, $name), $name);
        }

        foreach ($names as $img) {

            DB::table('drequirement_images')->insert([
                'designer_id' => $designer->id,
                'image'      => $img,
            ]);
        }
            
        return back()->with('message', 'requirement Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show(Designer $designer, $id)
    {
        //

        $requirement = Designer::where('id', $id)->first();

        return view('designer.show', compact('requirement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit(Designer $designer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designer $designer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designer $designer)
    {
        //
    }

    public function showforseller() {
        dd(Auth::user()->profile);
        $requirement = Designer::where('state_id', Auth::user()->profile->product_district_id)->first();
    
        return view('designer.showtoartisan', compact('requirement'));
    }

}
