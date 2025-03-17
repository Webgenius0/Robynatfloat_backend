<?php

namespace App\Services\Web\Backend\V1\Blog;

use App\Http\Requests\Web\Backend\V1\Dropdown\Blog\BlogRequest;
use App\Models\Blog;
use App\Repositories\Web\Backend\V1\Blog\BlogRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class BlogService
{
    protected BlogRepositoryInterface $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function bloglist($request): mixed
    {
        try {
            // Get blog list from the repository
            $blogs = $this->blogRepository->blogList(); // Ensure this returns a query, not a collection
            // dd($blogs);
            // Searching the blog list if the search term is provided
            if ($request->has('search') && !empty($request->search)) {
                $searchTerm = $request->search;
                $blogs = $blogs->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('slug', 'like', '%' . $searchTerm . '%');
                });
            }

            // Return the blog data with DataTables
            return DataTables::of($blogs)

                ->addColumn('title', function ($data) {
                    return '<td class="ps-1">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0">
                                       <a class="text-inherit">' . e($data->title) . '</a>
                                   </h5>
                               </div>
                           </td>';
                })
                ->addColumn('content', function ($data) {
                    return '<td class="ps-1">
                               <div class="d-flex align-items-center">
                                   <p class="mb-0">' . Str::limit($data->content, 100) . '</p>
                               </div>
                           </td>';
                })
                ->addColumn('image', function ($data) {
                    $imageUrl = optional($data->images()->latest()->first())->url ?? 'default-image.png'; // Handle missing images

                    return '<td class="ps-1">
                           <div class="d-flex align-items-center">
                               <img src="' . asset($imageUrl) . '" alt="Blog Image" width="100">
                           </div>
                       </td>';
                })

                ->addColumn('action', function ($data) {
                    return '<td class="ps-1">
                               <div class="d-flex align-items-center">
                                   <button type="button" class="btn btn-secondary-soft mb-2" onclick="editModal(\'' . e($data->slug) . '\')">Edit</button>
                                   <button type="button" class="btn btn-danger-soft mb-2" onclick="deleteAlert(\'' . e($data->slug) . '\')">Delete</button>
                               </div>
                           </td>';
                })
                ->rawColumns(['title', 'content', 'image', 'action']) // Ensure all columns with HTML are escaped properly
                ->make(true);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\BlogService::bloglist', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function blogstore(array $data): Blog
    {
        try {
            return $this->blogRepository->storeBlog($data);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\BlogService::blogstore', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function blogedit(Blog $blog): array
    {
        try {
            return ['html' => view('backend.layouts.blog.component.update', compact('blog'))->render()];
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\BlogService::blogedit', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * update
     * @param array $credentials
     * @param \App\Models\Blog $blog
     * @return void
     */

    public function updateblog(array $credentials, Blog $blog): void
    {
        try {

            $this->blogRepository->updateBlog($credentials, $blog);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\BlogService::updateblog', ['error' => $e->getMessage()]);
            throw $e; // Rethrow the exception to handle it at a higher level
        }
    }
}
