<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $category;
    public function __construct()
    {

        $this->category = new Category();
    }
    public function index()
    {
        $categories = $this->category->all();
        return view('category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Adicionar Nova Categoria";
        $categories = $this->category->all();
       // $users = $this->user->all();
       return view('category.create' , compact('categories', 'title'));
    }

    public function store(Request $request)
    {

        Category::create($request->all());

           $category = new Category();


      $category->name = $request->name;
      $category->description = $request->description;
      $category->is_active = $request->is_active == true ? 1:0;

      $category->save();

      Session::flash('success', 'Categoria cadastrada com sucesso');
      return redirect()->route('categories.index');

       // return redirect()->route('categories.index')->with('status', 'Categoria cadastrada com sucesso');




    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
