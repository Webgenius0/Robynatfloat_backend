<?php

namespace App\Repositories\Web\Backend\V1\Blog;

use App\Helpers\Helper;
use App\Http\Requests\Web\Backend\V1\Dropdown\Blog\BlogRequest;
use App\Models\Blog;
use Exception;
use Illuminate\Support\Facades\Log;

class BlogRepository implements BlogRepositoryInterface
{
    public function BlogList(): mixed
    {
       try {
        return Blog::with('images')->select('id', 'title', 'slug', 'content', 'created_at');

       }
       catch (Exception $e) {
        Log::error('App\Repositories\Web\Backend\V1\Blog\BlogRepository::BlogList', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function storeBlog(array $data): mixed
{

        try {
            $blog = Blog::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => Helper::generateUniqueSlug($data['title'], 'blogs'),
            ]);

            if (!empty($data['blog_images'])) {
                foreach ($data['blog_images'] as $imageFile) {
                    $path = $imageFile->store('blogs', 'public'); // Store image in storage/app/public/blogs
                    $blog->images()->create(['url' => $path]); // Ensure 'url' is set
                }
            }



            return $blog;
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Blog\BlogRepository::storeBlog', ['error' => $e->getMessage()]);
            throw $e;
        }


}



public function updateBlog(array $data, Blog $blog): Blog
{
    try {
        // Update the blog fields
        $blog->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => Helper::generateUniqueSlug($data['title'], 'blogs'), // Ensure slug is updated
        ]);

        // Handle the image upload if provided
        if (isset($data['blog_images']) && is_array($data['blog_images'])) {
            foreach ($data['blog_images'] as $imageFile) {
                try {
                    // Store the image in the 'public' disk under the 'blogs' directory
                    $path = $imageFile->store('blogs', 'public');

                    // Create a new image record associated with the blog
                    $blog->images()->create(['url' => $path]);
                } catch (\Exception $e) {
                    // Log any errors that occur during image storage
                    Log::error('Failed to store image: ' . $e->getMessage());
                }
            }
        }

        return $blog; // Return the updated blog instance
    } catch (Exception $e) {
        // Log the error and rethrow the exception
        Log::error('App\Repositories\Web\Backend\V1\Blog\BlogRepository::updateBlog', ['error' => $e->getMessage()]);
        throw $e; // Rethrow the exception to handle it at the service level
    }
}



public function deleteBlog(Blog $blog): mixed
{
    try {
        return $blog->delete();
    } catch (Exception $e) {
        Log::error('App\Repositories\Web\Backend\V1\Blog\BlogRepository::deleteBlog', ['error' => $e->getMessage()]);
        throw $e;
    }
}
}
