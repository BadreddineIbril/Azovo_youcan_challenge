<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Product\ProductController;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product';

    /**
     * Execute the console command.
     */
    public function handle(){

        // --- Product Data ---
        $data = [
            'name' => $this->ask('Enter product name'),
            'description' => $this->ask('Enter product description'),
            'price' => $this->ask('Enter product price'),
        ];

        // --- Select Category ---
        $categories = Category::pluck('name')->toArray();
        $selectedCategory = $this->choice('Select a category', $categories);
        $data['category_id'] = Category::where('name', $selectedCategory)->value('id');

        // --- Handle Image ---
        $imagePath = null;
        $imageFile = $this->ask('Enter the local path to the image file');
        if (file_exists($imageFile)) {
            $imagePath = Storage::disk('public')->putFile('product_images', $imageFile);
        } else {
            $this->error('Image file not found or path is empty. Product will be created without an image.');
        }
        $data['image'] = $imagePath;

        // --- Validate Data ---
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        // --- Validate the input data --- 
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }

        // --- Store Product ---
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image'],
            'category_id' => $data['category_id'],
        ]);
        
        // --- Success Message --- 
        $this->info('Product created successfully:');
        $this->table(['ID', 'Name', 'Description', 'Price', 'Image', 'Category ID'], [[
            $product->id,
            $product->name,
            $product->description,
            $product->price,
            $product->image,
            $product->category_id,
        ]]);
    }
}
