<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
       /* $rules = [

            'name' => 'required|min:5',
            'brand' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric'


        ];

    if ($request ->image != "") {
        $rules['image'] = 'image';
    }

      $validator = Validator::make($request->all(),$rules);


      if ($validator->fails()) {
        return redirect()->route('products.create')
            ->withInput()->withErrors($validator);
      }*/

      //cadastrar os produtos na base de Dados
      $product = new product();
      $product -> name = $request->name;
      $product -> brand = $request->brand;
      $product -> price = $request->price;
      $product -> description = $request->description;
      $product -> save();



      if ($request ->image != "") {


      $image = $request->image;
      $ext = $image->getClientOriginalExtension();
      $imageName = time().'.'.$ext; //imagem com nome unico



      //salvando os arquivos no diretorio
      $image->move(public_path('uploads/products'), $imageName);

      //salvando a imagem na database
      $product-> image = $imageName;
      $product-> save();

      }

      return redirect()->route('products.index')->with('sucess',' product added sucessdully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //$product = Product::Where('id', $products->id)->first();
        $products= $product->products()->get();

        return view('products.show', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
