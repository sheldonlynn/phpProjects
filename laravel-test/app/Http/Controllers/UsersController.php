<?php

namespace App\Http\Controllers;

use App\User;
//use Illuminate\Http\Request;
use Igaster\LaravelCities\Geo;
use Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        //return $users;

        return view('users.index', compact('users'));
    }

    public function show($id) {
        $user = User::findOrFail($id);

        //return $user;
        return view('users.show', compact('user'));
    }

    public function create() {
        return view('users.create');
    }

    public function geo() {
        //return "hi";
        return geo::getCountry('US');
    }

    public function store() {
//        $input = Request::all();
//        //$user = User::create($input);
//        return $input;

        $user = new User;

        $user->firstname = Request::get('firstname');
        $user->lastname = Request::get('lastname');
        $user->middlename = Request::get('middlename');
        $user->email = Request::get('email');

        $user->linkedinurl = Request::get('linkedinurl');
        $user->streetaddress = Request::get('street_number') . ' ' . Request::get('route');
        $user->city = Request::get('locality');
        $user->state = Request::get('administrative_area_level_1');

        // get country id from our countries table, using country name from the form
        //$countryid = \DB::table('countries')->where('name', Request::get('country'))->first()->id;

        $user->countryid = Request::get('country');
        $user->postalzipcode = Request::get('postal_code');

        $user->workphoneextension = Request::get('extension');
        $user->mobilephone = Request::get('phone');


        //$user->password = '1234';
        $user->password = Request::get('password');
        $user->save();

        return redirect('users');
        //return $user;
    }
}
