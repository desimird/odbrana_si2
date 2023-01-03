<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::latest()->paginate(10);
        //dd($listings);
        return view('index', ['listings'=> $listings]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adding_ad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'manuf_year' => 'required',
            'kilometers' => 'required',
            'price' => 'required',
            'drive_type' => 'required',
            'shifter_type' => 'required',
            'state' => 'required',
            'fuel_type' => 'required',
            'horse_power' => 'required',
            'motor_cc' => 'required',
            'no_doors' => 'required',
            'imgpath' => 'required|image',
        ]);
        // if($request->hasFile('logo')){
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        
        //dd( auth()->id());

        $imagePath = request('imgpath')->store('uploads', 'public');
        
        //dd(public_path("storage/{$imagePath}"));
        //Ovo ne radi i ne znam da namestim
         $image = Image::make(public_path("storage/{$imagePath}"));
         $image->save();

        $formFields['user_id'] = auth()->id();
        

        Listing::create($formFields);

        return redirect('/profile');//->with('message', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
    

    public function my_listings(){

        //dd(auth()->user()->listings()->get());
        return view('profile', ['listings' => auth()->user()->listings()->get()]);

    }


}
