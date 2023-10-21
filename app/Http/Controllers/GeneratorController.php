<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Generator;
use App\Http\Requests\StoreGeneratorRequest;
use App\Http\Requests\UpdateGeneratorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $generator = Generator::with('brands')->where('user_id', $user_id)->get();
        //dd($generator);
        return view('generator.index')->with('generator', $generator);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user_id = auth()->user()->id;
        $brands = Brands::where('user_id', $user_id)->get();
        //dd($brands);

        return view('generator.create')->with('brands', $brands);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneratorRequest $request)
    {
        //
        $brand = Brands::find($request->brand);
        $prompt = "Schrijf een producttekst voor " . $request->product_name . " dit product van in de categorie ". $request->product_category . ". De tekst moet ongeveer " . $request->words . " woorden lang zijn. Dit product heeft
        de volgende omschrijving " . " $request->description" . ". Het doel van deze tekst is " . $brand->goal . ". De tone of voice is " . $brand->tone . ". Het product wordt verkocht op een webshop die zichzelf zo omschrijft: " . $brand->description . ". Begin met een html h2 element met koptekst waar de productnaam in voor komt en gebruik van tussenkoppen met html h3 elemanten aan het begin van de alinea. Gebruik van een html opmaak.";

        //dd($prompt);
        $result = OpenAI::completions()->create([

            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $prompt,
            'max_tokens' => 1000,
        ]);


        switch ($request->words) {
            case "100":
                $amount = 1;
                break;
            case "200":
                $amount = 1;
                break;
            case "300":
                $amount = 1;
                break;
            case "500":
                $amount = 2;
                break;
            case "750":
                $amount = 2;
                break;
            case "1000":
                $amount = 3;
                break;

        }

        $tekst = Generator::create([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'text' => $result->choices[0]->text,
            'brands_id' => $request->brand,
            'amount' => $amount,
            'user_id' => auth()->id(),

        ]);

        return response()->redirectTo(route('generator.show', ['generator' => $tekst->id]));
    }


    /**
     * Display the specified resource.
     */
    public function show(Generator $generator)
    {
        //
        return view('generator.show')->with('generator', $generator);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generator $generator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneratorRequest $request, Generator $generator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generator $generator)
    {
        //
    }


}
