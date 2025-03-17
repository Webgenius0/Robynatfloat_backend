<?php

namespace App\Http\Controllers\Web\Backend\V1\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\V1\Dropdown\Blog\BlogRequest;
use App\Models\Blog;
use App\Services\Web\Backend\V1\Blog\BlogService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;


class BlogController extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->blogService->bloglist($request);
            }

            return view('backend.layouts.blog.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::bloglist', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again..!');
        }
    }


public function store(BlogRequest $blogRequest): JsonResponse
{
    try{
        $validatedData = $blogRequest->validated();

        $response = $this->blogService->blogstore($validatedData);
        return $this->success(201, 'Created Successfully.', $response);
    } catch (Exception $e) {
        Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::store', ['error' => $e->getMessage()]);
        return $this->error(500, 'Server Error.');
    }
}
public function edit(Blog $blog): JsonResponse{
    try {
        $response = $this->blogService->blogedit($blog);
        return $this->success(200, 'Successfull', $response);
    } catch (Exception $e) {
        Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::edit', ['error' => $e->getMessage()]);
        return $this->error(500, 'Server Error.');
    }
}

public function update(BlogRequest $blogRequest, Blog $blog): JsonResponse{

    try {
        $validatedData = $blogRequest->validated();
        
        $this->blogService->updateblog($validatedData, $blog);

        return $this->success(200, 'Updated Successfully.', $blog);
    } catch (Exception $e) {
        Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::updateblog', ['error' => $e->getMessage()]);
        return $this->error(500, 'Server Error.');
    }
}





public function destroy(Blog $blog): JsonResponse{
    // dd($blog);
    try {

        $blog->delete();
        return $this->success(202, 'Delete Successfully');
    } catch (Exception $e) {
        Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::destroy', ['error' => $e->getMessage()]);
        return $this->error(500, 'Server Error.');
    }
}
}
