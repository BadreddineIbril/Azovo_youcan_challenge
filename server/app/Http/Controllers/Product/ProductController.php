<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    use GeneralTrait;

    /**
         * Display All Products
         *
         * @return \Illuminate\Http\Response
     */    
    public function index(){

        $products = Product::with('category:id,name')
                        ->orderBy('id', 'desc')
                        ->get();  // ->paginate(10)

        return (new static)->returnData("All products retrieved successfully", $products);

    }



    /**
         * Display All Products By Category
         *
         * @return \Illuminate\Http\Response
     */    
    public function indexByCategory($category_id){

        $products = Product::where("category_id", $category_id)
                        ->with('category:id,name')
                        ->orderBy('id', 'desc')
                        ->get();  // ->paginate(10)

        return (new static)->returnData("All products retrieved successfully", $products);

    }



    /**
     * Display the specified product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
    public function show($id){

        $product = Product::with('category:id,name')
                    ->where('id', $id)
                    ->firstOrFail();

        return (new static)->returnData("Product retrieved successfully", $product);

    }



    /**
     * Create a new product in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(ProductRequest $request){

        // ******** Handle image upload *********
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // ******** Add Product *******
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'category_id' => $request->input('category_id'),
        ]);

        return (new static)->returnData("Product created successfully", $product);

    }



    /**
     * Update the specified product in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(ProductRequest $request, $id){

        $product = Product::where('id', $id)->firstOrFail();

        // ******** Handle image upload *********
        if ($request->hasFile('image')) {
            // --------- Store the new image ---------
            $newImage = $request->file('image')->store('product_images', 'public');
            
            // --------- Delete the old image ---------
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        }

        // ******** Update Product *******
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => isset($newImage) ? $newImage : $product->image, 
            'category_id' => $request->input('category_id'),
        ]);

        return (new static)->returnData("Product updated successfully", $product);

    }



   /**
     * Remove the specified product from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id){

        $product = Product::where('id', $id)->firstOrFail();

        // --------- Delete the image ---------
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // ******** Delete Product *******
        $product->delete();

        return (new static)->returnSuccessMessage("Product deleted successfully");

    }

}
