<?php
namespace App\Repositories\API\V1\Supplier;

use App\Helpers\Helper;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Repositories\API\V1\Supplier\ServiceRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceRepository implements ServiceRepositoryInterface
{

    public function serviceStore(array $credentials): Service
    {
        try {
          $service= Service::create([
            'user_id' => auth()->id(),
            'product_name' => $credentials['product_name'],
            'price' => $credentials['price'],
            'quantity' => $credentials['quantity'],
            'discount' => $credentials['discount'],
            'about' => $credentials['about'],
            'slug' => Helper::generateUniqueSlug($credentials['product_name'], 'services', 'slug'),
            'sku' => Helper::generateUniqueSlug($credentials['product_name'], 'services', 'sku'),
          ]);
          //here save the images
          if (isset($credentials['service_images']) && is_array($credentials['service_images'])) {
            foreach ($credentials['service_images'] as $imageFile) {
                try {
                    // Store the image in the 'public' disk under the 'services' directory
                    $path = $imageFile->store('services', 'public');

                    // Create a new image record associated with the blog
                    $service->images()->create(['url' => $path]);
                } catch (\Exception $e) {
                    // Log any errors that occur during image storage
                    Log::error('Failed to store image: ' . $e->getMessage());
                }
            }
        }
        return $service;


        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\Service\ServiceRepository::serviceStore', ['error' => $e->getMessage()]);
            throw $e;
        }

    }

    public function serviceIndex()
    {
        try {
            return Service::all();
        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\Service\ServiceRepository::serviceIndex', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function serviceUpdate(array $credentials, Service $service, $slug): Service
{
    try {
        // Attempt to fetch the service by slug
        $service = Service::where('slug', $slug)->first();

        // If service not found, throw an exception to be handled in the controller
        if (!$service) {
            throw new \Exception('Service not found.');
        }

        // Update the service if found
        $service->update([
            'product_name' => $credentials['product_name'],
            'price' => $credentials['price'],
            'quantity' => $credentials['quantity'],
            'discount' => $credentials['discount'],
            'about' => $credentials['about'],
            'slug' => Helper::generateUniqueSlug($credentials['product_name'], 'services', 'slug'),
            'sku' => Helper::generateUniqueSlug($credentials['product_name'], 'services', 'sku'),
        ]);

        // Handle image updates if provided
        if (isset($credentials['service_images']) && is_array($credentials['service_images'])) {
            foreach ($credentials['service_images'] as $imageFile) {
                try {
                    if ($imageFile->isValid()) {
                        $path = $imageFile->store('services', 'public');
                        $service->images()->create(['url' => $path]);
                    } else {
                        Log::warning('Invalid image file encountered.');
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to store image: ' . $e->getMessage());
                }
            }
        }

        // Return the updated service
        return $service;

    } catch (\Exception $e) {
        Log::error('App\Repositories\API\V1\Service\ServiceRepository::serviceUpdate', ['error' => $e->getMessage()]);
        throw $e;
    }
}

    public function serviceShow($slug)
    {
        try {
            return Service::where('slug', $slug)->first();
        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\Service\ServiceRepository::serviceShow', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function serviceDelete( $slug)
    {
        try {
            $service = Service::where('slug', $slug)->first();
            if (!$service) {
                throw new \Exception('Service not found.');
            }
            $service->delete();
            return $service;
        } catch (Exception $e) {
            Log::error('App\Repositories\API\V1\Service\ServiceRepository::serviceDelete', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function galleryStore(array $request)
{
    try {
        // Check if an image is present
        if (isset($request['gallery_image'])) {
            $imageFile = $request['gallery_image'];

            // Store the image in the 'public/services' directory
            $path = $imageFile->store('gallery_images', 'public');

            // Create a new gallery image record
            $galleryImage = GalleryImage::create([
                'user_id' => auth()->id(),
                'gallery_image' => $path,
            ]);

            return $galleryImage;
        } else {
            throw new \Exception('No image file provided.');
        }
    } catch (\Exception $e) {
        // Log any errors that occur during image storage
        Log::error('Failed to store gallery image: ' . $e->getMessage());
        throw $e;
    }
}
public function getGallery(){
    try{
        $gallery = GalleryImage::where('user_id', auth()->id())->get();
        return $gallery;
    }catch(Exception $e){
        Log::error('App\Repositories\API\V1\Service\ServiceRepository::getGallery', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function updateGallery(array $request,$slug){
    try{
        $galleryImage = GalleryImage::where('id', $slug)->first();
        // Check if a new image is provided
        if (isset($request['gallery_image'])) {
            $imageFile = $request['gallery_image'];

            // Delete the old image if it exists
            if ($galleryImage->gallery_image && Storage::disk('public')->exists($galleryImage->gallery_image)) {
                Storage::disk('public')->delete($galleryImage->gallery_image);
            }

            // Store the new image
            $path = $imageFile->store('gallery_images', 'public');

            // Update the image path
            $galleryImage->update([
                'gallery_image' => $path,
            ]);
        }

        return $galleryImage;


    }catch(Exception $e){
        Log::error('App\Repositories\API\V1\Service\ServiceRepository::updateGallery', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function destroyGallery($slug){
    try {
        $galleryImage = GalleryImage::where('id', $slug)->first();
        if ($galleryImage->gallery_image && Storage::disk('public')->exists($galleryImage->gallery_image)) {
            Storage::disk('public')->delete($galleryImage->gallery_image);
        }
        $galleryImage->delete();
        return $galleryImage;
    } catch (Exception $e) {
        Log::error('App\Repositories\API\V1\Service\ServiceRepository::destroyGallery', ['error' => $e->getMessage()]);
        throw $e;
    }
}


}
