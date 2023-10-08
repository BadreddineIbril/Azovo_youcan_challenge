<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryRequest;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    
    use GeneralTrait;

    /**
         * Display All Categories
         *
         * @return \Illuminate\Http\Response
     */    
    public function index(){

        $categories = Category::query()->orderBy('id', 'desc')->get();  // ->paginate(10)

        return (new static)->returnData("All Categories retrieved successfully", $categories);

    }



    /**
     * Display the specified category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
    public function show($id){

        $category = Category::where('id', $id)->firstOrFail();

        return (new static)->returnData("Category retrieved successfully", $category);

    }



    /**
     * Create a new category in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(CategoryRequest $request){

        // ******** Add category *******
        $category = Category::create($request->all());

        return (new static)->returnData("Category created successfully", $category);

    }



    /**
     * Update the specified category in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(CategoryRequest $request, $id){

        $category = Category::where('id', $id)->firstOrFail();

        // ******** Update category *******
        $category->update($request->validated());

        return (new static)->returnData("Category updated successfully", $category);

    }



   /**
     * Remove the specified category from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id){

        $category = Category::where('id', $id)->firstOrFail();

        // ******** Delete category *******
        $category->delete();

        return (new static)->returnSuccessMessage("Category deleted successfully");

    }

}
