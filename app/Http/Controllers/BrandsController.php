<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Http\Requests\StoreBrandsRequest;
use App\Http\Requests\UpdateBrandsRequest;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $allbrands = Brands::where('user_id', $user_id)->get();

        return view('brands.index')->with('allbrands', $allbrands);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandsRequest $request)
    {
        //
        $brand = Brands::create([
            'name'              =>      $request->name,
            'description'       =>      $request->description,
            'tone'              =>      $request->tone,
            'goal'              =>      $request->goal,
            'user_id'           =>      auth()->user()->id,
        ]);

        return response()->redirectTo(route('brands.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
        dd($brands);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brand)
    {
        //
        //dd($brand);
        return view('brands.edit')->with('brands', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandsRequest $request, Brands $brand)
    {
        //
        $brand->update($request->validated());
        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands)
    {
        //
    }
}
