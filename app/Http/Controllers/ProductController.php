<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Traits\PriceTrait;
use App\Services\PriceService;

use function App\Helpers\setPriceToUSD;

class ProductController extends Controller
{
    // use PriceTrait;
    // protected $priceService;

    // public function __construct( PriceService $PriceService )
    // {
    //     $this->priceService = $PriceService;
    // }

    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $productData = $request->validated();
        // $productData['slug'] = Str::slug( $productData['name'] , '-');

        // $productData['price_usd'] = $this->setPriceToUSD( $productData['price'] );
        // $productData['price_usd'] = $this->priceService->setPriceToUSD( $productData['price'] );
        $productData['price_usd'] = setPriceToUSD( $productData['price'] );

        $product = Product::create($productData);

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $productDataUpdate = $request->validated();
        // $productDataUpdate['slug'] = Str::slug( $productDataUpdate['name'] , '-');

        $product->update( $productDataUpdate );

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }



    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

}
