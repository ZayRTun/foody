<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(Collection $collection)
    {
//        $address = Auth::user()->address()->latest()->first();
//
//        $all_collection = Collection::all();
//
//        $menus = $collection->menu;
//
        ////        return view('menus', compact('menus', 'collection', 'address', 'col_json'));
        //      return response()->json([
        //          'current_collection' => $collection,
        //          'menus' => $menus,
        //          'address' => $address,
        //          'all_collection' => $all_collection
        //      ]);
        $col = $collection->toJson();

        return view('menus', compact('col'));
    }
}
