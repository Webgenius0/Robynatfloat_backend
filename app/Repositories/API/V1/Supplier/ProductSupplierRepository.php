<?php

namespace App\Repositories\API\V1\Supplier;

use App\Helpers\Helper;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductSupplierRepository implements ProductSupplierRepositoryInterface
{

    public function getAllSupplierProduct()
    {
        try{
            $userId = auth()->id();
            $supplierProducts = Product::with('images')->where('user_id',$userId)->get();
            return $supplierProducts;
        } catch (\Exception $e) {
            Log::error('App\Repositories\API\V1\Supplier\ProductSupplierRepository:getAllSupplierProduct', ['error' => $e->getMessage()]);
        }
    }

    public function addSupplierProduct(array $credentials): Product
    {
        try {
          $product= Product::create([
            'user_id' => auth()->id(),
            'product_name' => $credentials['product_name'],
            'price' => $credentials['price'],
            'quantity' => $credentials['quantity'],
            'discount' => $credentials['discount'],
            'about' => $credentials['about'],
            'slug' => Helper::generateUniqueSlug($credentials['product_name'], 'products', 'slug'),
            'sku' => Helper::generateUniqueSlug($credentials['product_name'], 'products', 'sku'),
          ]);
        //   dd($product);
          //here save the images
          if (isset($credentials['product_images']) && is_array($credentials['product_images'])) {
            foreach ($credentials['product_images'] as $imageFile) {
                Log::info('Image file: ', ['file' => $imageFile]);
                try {
                    // Store the image in the 'public' disk under the 'products' directory
                    $path = $imageFile->store('product', 'public');

                    // Create a new image record associated with the blog
                    $product->images()->create(['url' => $path]);
                } catch (\Exception $e) {
                    // Log any errors that occur during image storage
                    Log::error('Failed to store image: ' . $e->getMessage());
                }
            }
        }

          //here save the images
          // $product->images()->create(['url' => $path]);
          // $product->images()->create(['url' => $path]);
          // $product->images()->create(['url' => $path]);
        return $product;


        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\product\productRepository::addSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }

    }
    public function getSupplierProductById($slug)
    {
        try {
            return Product::where('slug', $slug)->with('images')->first();
        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\product\productRepository:getSupplierProductById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function updateSupplierProduct($slug, array $credentials)
{
    try {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Update product details
        $product->update([
            'product_name' => $credentials['product_name'] ?? $product->product_name,
            'price' => $credentials['price'] ?? $product->price,
            'quantity' => $credentials['quantity'] ?? $product->quantity,
            'discount' => $credentials['discount'] ?? $product->discount,
            'about' => $credentials['about'] ?? $product->about,
        ]);

        // Handle image uploads if new images are provided
        if (isset($credentials['product_images']) && is_array($credentials['product_images'])) {
            // Delete old images and their files first
            $this->deleteProductImages($product);

            // Store new images
            foreach ($credentials['product_images'] as $imageFile) {
                try {
                    if (!$imageFile->isValid()) {
                        Log::error('Invalid image file uploaded');
                        continue;
                    }

                    // Generate unique filename
                    $path = $imageFile->store('product', 'public');

                    // Create new image record
                    $product->images()->create([
                        'url' => $path,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to store image: ' . $e->getMessage());
                }
            }
        }

        // Load fresh images data
        $product->load('images');

        return $product;

    } catch (Exception $e) {
        Log::error('App\Repositories\API\V1\product\productRepository:updateSupplierProduct', ['error' => $e->getMessage()]);

        return response()->json([
            'status' => false,
            'message' => 'An error occurred while updating the product',
            'error' => $e->getMessage()
        ], 500);
    }
}

protected function deleteProductImages($product)
{
    // Get all images associated with the product
    $images = $product->images;

    foreach ($images as $image) {
        try {
            // Delete the physical file
            $filePath = str_replace('storage/', '', $image->url);
            Storage::disk('public')->delete($filePath);

            // Delete the database record
            $image->delete();
        } catch (\Exception $e) {
            Log::error('Failed to delete product image: ' . $e->getMessage());
        }
    }
}



    /**
     * Delete a supplier product by its slug.
     *
     * @param string $slug
     * @return \Illuminate\Http\JsonResponse|null
     */

    public function deleteSupplierProduct($slug)
    {
        try {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                $product->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Supplier product deleted successfully',
                ], 200);
            }
            return null;
        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\product\productRepository:deleteSupplierProduct', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



}
