<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Generator;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){

    $user_id = auth()->user()->id;
    $brands = Brands::where('user_id', $user_id)->take(5)->get();
    $generator = Generator::where('user_id', $user_id)->take(5)->get();

    return view('dashboard')->with(compact('brands', 'generator'));
    }
}
