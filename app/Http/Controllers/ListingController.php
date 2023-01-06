<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::where('approved','1')->latest()->filter(request(['tags', 'search_input']))->paginate(10);
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
        
        $image = $request->file('imgpath');
        $image->move(public_path().'/storage/uploads/', $img = 'img_'.Str::random(15).'.jpg');

        // Ovo ne radi i ne znam da namestim
        // $image = Image::make(public_path("storage/{$imagePath}"));
        // $image->save();

        $formFields['user_id'] = auth()->id();
        $formFields['imgpath'] = $img;
        

        Listing::create($formFields);

        return redirect("/profile");//->with('message', 'Listing created successfully!');
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
        Listing::whereId($id)->delete();
        return back();
        //Listing::whereId(auth()->user()->id)->delete();
        //return redirect('/');
    }
    

    public function my_listings(){

        //dd(auth()->user()->listings()->get());
        return view('profile', ['listings' => auth()->user()->listings()->get()]);

    }

    public function admin_listings(){
        return view('admin_index', ['listings' => Listing::where('approved', '1')->latest()->filter(request(['tags', 'search_input']))->paginate(10)]);
    }


    public function listings_on_hold(){
        return view('admin_on_hold', ['listings' => Listing::where('approved', '0')->latest()->filter(request(['tags', 'search_input']))->paginate(10)]);
    }

    public function approve($id){

        Listing::whereId($id)->update(['approved' => '1']);
        return back();
    }

    public function det_search(Request $request){
   
        $listings = Listing::where(function ($query) use ($request) {
            if($request->brand){
                $query->where('brand', 'like', '%' . $request->brand . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->type){
                $query->where('type', 'like', '%' . $request->type . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->manuf_year){
                $query->where('manuf_year', 'like', '%' . $request->manuf_year . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->kilometers){
                $query->where('kilometers', 'like', '%' . $request->kilometers . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->drive_type){
                $query->where('drive_type', 'like', '%' . $request->drive_type . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->shifter_type){
                $query->where('shifter_type', 'like', '%' . $request->shifter_type . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->price){
                $query->where('price', 'like', '%' . $request->price . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->state){
                $query->where('state', 'like', '%' . $request->state . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->fuel_type){
                $query->where('fuel_type', 'like', '%' . $request->fuel_type . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->horse_power){
                $query->where('horse_power', 'like', '%' . $request->horse_power . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->motor_cc){
                $query->where('motor_cc', 'like', '%' . $request->motor_cc . '%');
            }
        })->where(function ($query) use ($request) {
            if($request->motor_cc){
                $query->where('no_doors', 'like', '%' . $request->no_doors . '%');
            }
        })->get();

        return view('index', ['listings'=> $listings]);
    }
}
