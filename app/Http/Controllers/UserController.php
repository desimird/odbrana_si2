<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'username' => ['required'],
            'city' => ['required'],
            'birthday' => ['required'],
            'surname' => ['required'],
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6']

        ]);
        #dd($formFields);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //return view('/', compact('user')); //->with('message', 'User created and logged in.');
        return redirect('/profile');

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
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {   
        
        User::whereId(auth()->user()->id)->delete();
        return redirect('/');
    }


    public function login(Request $request, User $user)
    {

        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'

        ]);

        //dd(auth()->attempt($formFields));
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            //dd(auth()->user()->is_admin);
            if (auth()->user()->is_admin) {
                return redirect("/admin/index");
            } else {
                return redirect("/profile"); //->with('message', 'You are now logged in!');  ///meseges da se doda
            }
        }

        return redirect('/neradi'); //->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); //->with('message', 'You have been logout!');
    }


    public function update_password(Request $request)
    {
        # Validation
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
        ]);


        #Match The Old Password
        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back()->with("status", "Password changed successfully!");

    }

    public function admin_users(){
        return view('admin_users', ['users' => User::all()]);
    }

    public function delete_user($id) {
        Listing::where('user_id',$id)->delete();
        User::whereId($id)->delete();
        return back();
    }
}