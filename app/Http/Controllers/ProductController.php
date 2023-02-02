<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Image;
use App\Models\Product;
use App\Actions\CreateImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product\ProductRepo\format;
use Carbon\Carbon;
use App\Product\productReport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(productReport $report)
    {
        $products = Product::query()
        ->with('images','posts')->get();
        return $products;



        $begin = 100;
        $end = 5000;
        return $report->between($begin,$end,new format());
        return $products[0]->images;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CreateImage $createImage)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();

        if($request->hasFile('images')){
            $data = (object)[
                'images' => $request->file('images'),
                'id' => $product->id,
                'type' => 'App\Models\Product'
            ];
            $createImage->handle($data);
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
