<?php
namespace App\Repositories\API\V1\Service;

use App\Helpers\Helper;
use App\Models\Service;
use App\Repositories\API\V1\Service\ServiceRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

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


}
