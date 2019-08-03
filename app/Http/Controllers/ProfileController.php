<?php

namespace App\Http\Controllers;

use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Exceptions\UnauthorizedException;

class ProfileController extends Controller
{
    use OwnsRecord;

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function determineProfileRoute()
    {

        $profileExists = $this->profileExists();
        $user = User::where('id', Auth::id())->first();

        if ($profileExists) {

            return Redirect::route('show-profile', compact('user'));
        }

        return view('profile.create', compact('user'));
    }

    public function showProfileToUser()
    {
        $profile = Profile::where('user_id', Auth::id())->first();

        if (!$profile) {

            return Redirect::route('profile.create');
        }

        $user = User::where('id', $profile->user_id)->first();



        return view('profile.show', compact('profile', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $profileExists = $this->profileExists();
        $user = User::where('id', Auth::id())->first();


        if ($profileExists) {

            return Redirect::route('show-profile', compact('user'));
        }

        return view('profile.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|alpha_num|max:60',
            'last_name' => 'required|alpha_num|max:60',
            'mobile' => 'required|digits:10',
            'gender' => 'boolean|required',
            'birthdate' => 'date|required'
        ]);

        $profileExists = $this->profileExists();

        if ($profileExists) {

            return Redirect::route('show-profile');
        }

        $profile = Profile::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'user_id' => Auth::user()->id
        ]);

        $profile->save();

        $user = User::where('id', '=', $profile->user_id)->first();

        //alert()->success('Congrats!', 'You made your profile');

        return view('profile.show', compact('profile', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        $user = User::where('id', $profile->user_id)->first();



        return view('profile.show', compact('profile', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        if (!$this->adminOrCurrentUserOwns($profile)) {

            throw new UnauthorizedException;
        }

        return view('profile.edit', compact('profile'));
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
        $this->validate($request, [
            'first_name' => 'required|alpha_num|max:60',
            'last_name' => 'required|alpha_num|max:60',
            'mobile' => 'required|digits:10',
            'gender' => 'boolean|required',
            'birthdate' => 'date|required'
        ]);

        $profile = Profile::findOrFail($id);

        if ($this->userNotOwnerOf($profile)) {

            throw new UnauthorizedException;
        }

        $profile->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate
        ]);

        alert()->success('Congrats!', 'You updated your profile');

        return Redirect::route('profile.show', ['profile' => $profile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        if ($this->userNotOwnerOf($profile)) {

            throw new UnauthorizedException;
        }

        Profile::destroy($id);



        //alert()->overlay('Attention!', 'You deleted a profile', 'error');

        return Redirect::route('home');
    }

    /**
     * @return mixed
     */

    private function profileExists()
    {
        $profileExists = DB::table('profiles')
            ->where('user_id', Auth::id())
            ->exists();

        return $profileExists;
    }
}

