<?php

namespace App\Http\Controllers\API\V1\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
 public function getAllBlog(Request $request)
    {
        try {
            $perPage = $request->query('per_page');
            $blogs = Blog::with('images')
                         ->select('id', 'title', 'slug', 'content', 'created_at')
                         ->latest()
                         ->paginate($perPage); // Added pagination

            return $this->success(200, 'Blog List', $blogs); // assuming 'success()' is defined in a parent controller or trait
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Blog\BlogController::getAllBlog', [
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    public function getSingleBlog($slug)
    {
        try {
            $blog = Blog::with('images')
                        ->where('slug', $slug)
                        ->firstOrFail(['id', 'title', 'slug', 'content', 'created_at']);

            return $this->success(200, 'Single Blog Details', $blog); // assuming 'success()' is defined in a parent controller or trait
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Blog\BlogController::getSingleBlog', [
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }
}
