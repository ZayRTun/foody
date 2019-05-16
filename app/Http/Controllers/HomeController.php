<?php

namespace App\Http\Controllers;

use App\Collection;
use App\User;
use App\Address;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $address = new Address;
        $user_address = Auth::user()->address()->latest()->first();

        if (Auth::user()->address()->count() > 1) {
            return view('home', compact('address', 'user_address'));
        } else {
            return view('home', compact('address', 'user_address'));
        }
    }

    public function store(User $user)
    {
        $collections = Collection::all();
        // if (!$user->address()->count() > 0) {
        //     dd("Calling from store");
        //     $user->address()->create([
        //         'city' => request('city'),
        //         'address' => request('address')
        //     ]);
        $address = $user->address()->latest()->first();

        if ($this->ifStringIsSame($address)) {
            return view('collections', compact('address', 'collections'));
        } else {
            $user->address()->create([
                'township' => request('township'),
                'address' => request('address')
            ]);

            $address = $user->address()->latest()->first();

            return view('collections', compact('address', 'collections'));
        }
    }

    public function update(User $user)
    {
        dd($user);
    }

    public function ifStringIsSame($address)
    {
        if (strtolower($address['township']) == strtolower(request('township')) && strtolower($address['address']) == strtolower(request('address'))) {
            return true;
        } else {
            return false;
        }
    }
}
